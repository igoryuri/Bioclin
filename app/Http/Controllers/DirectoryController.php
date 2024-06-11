<?php

namespace App\Http\Controllers;

use App\Models\Programming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;
//phpinfo();

class DirectoryController extends Controller
{

    public function index()
    {
        $programmings = Programming::query()->with('attachmentProgrammings')->get();

        ds($programmings);

        return view('program.index', compact('programmings'));
    }

    public function listDirectories()
    {
        $baseDirectory = public_path('storage/equipamentos');
        $content = $this->listContentDirectory($baseDirectory);


        return view('program.index', compact('content'));
    }

    public function listContentDirectory($directory)
    {
        $content = collect();

        $folders = glob($directory . '/*', GLOB_ONLYDIR);


        foreach ($folders as $folder) {
            $content[] = [
                'tipo' => 'pasta',
                'nome' => basename($folder),
                'slug' => Str::slug(basename($folder)),
                'caminho' => $folder,
                'conteudo' => $this->listContentDirectory($folder),
            ];
        }

        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $content[] = [
                'tipo' => 'arquivo',
                'nome' => $file->getFilename(),
                'caminho' => $file->getPathname(),
                'conteudo' => file_get_contents($file->getPathname()),
            ];
        }

        return $content;

    }

    private function compactarArquivos($caminho, $arquivos)
    {
        $zip = new ZipArchive;
        $zipPath = $caminho . '.zip';

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            foreach ($arquivos as $arquivo) {
                $zip->addFile($arquivo['caminho'], $arquivo['nome']);
            }

            $zip->close();

            return $zipPath;
        }

        return null;
    }

    public function downloadCompactado(Request $request)
    {
        $diretorio = $request->input('diretorio');
        $content[] = $this->listContentDirectory($diretorio);

        $arquivos = [];

        foreach ($content as $items) {
            foreach ($items as $item){
                if ($item['tipo'] === 'arquivo') {
                    $arquivos[] = $item;
                }
            }
        }

        $zipPath = $this->compactarArquivos($diretorio, $arquivos);

        if ($zipPath) {
            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            // Lida com erro na criação do arquivo zip
            // Pode ser útil para debug
            // dd('Erro ao criar o arquivo zip');
        }
    }

}
