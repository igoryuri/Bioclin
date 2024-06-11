@extends('templates.layout')

@section('title', 'Bioclin')

@section('css')
@endsection

@section('content')

    <div class="w-full max-w-7xl mx-auto px-2 py-4 flex flex-col gap-1">

        <section id="programa" class="bg-slate-200 px-2 md:px-12 py-6 rounded-t-lg shadow-2xl">
            <div class="p-4 leading-10">
                <h1 class="text-2xl font-bold">O Programa</h1>
                <div class="p-4 text-justify">
                    <p class="mt-4 font-medium">Com o objetivo de ter uma presença mais ativa no crescimento da
                        sociedade e contribuir com a melhoria
                        do
                        ensino, a Bioclin desenvolveu o programa Bioclin Educar. Incentivando a capacitação e a pesquisa
                        científica,
                        o programa visa atender aos cursos relativos às Ciências da Vida, como Farmácia, Bioquímica,
                        Medicina
                        Veterinária, entre outros, englobando os ensinos técnicos e superiores.</p>
                    <p class="mt-4 font-medium">Em uma de suas vertentes, o programa oferecre parceirias a diversas
                        organizações públicas e privadas,
                        inclusive no exterior, visando o aperfeiçoamento tecnológico para melhoria e o desenvolvimento
                        de
                        novos
                        kits. Como forma de complementar o conhecimento dos estudantes, o programa também ofererce
                        palestras
                        e
                        visitas técnicas para as instituições de ensino .</p>
                    <p class="mt-4 font-medium">
                        Esse programa é dividido em:
                    </p>
                </div>
            </div>
            <div class="flex gap-3 justify-center flex-col md:flex-row md:flex-wrap">
                <button data-modal-target="bioclin-jovem"
                        data-modal-toggle="bioclin-jovem"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #6c3920">
                    Bioclin Jovem Aprendiz
                </button>
                <button data-modal-target="bioclin-estagio"
                        data-modal-toggle="bioclin-estagio"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #d77b2e">
                    Bioclin Estágio
                </button>
                <button data-modal-target="bioclin-tecnico"
                        data-modal-toggle="bioclin-tecnico"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #9b262a">
                    Bioclin Curso Técnico
                </button>
                <button data-modal-target="bioclin-universidade"
                        data-modal-toggle="bioclin-universidade"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #404a99">
                    Bioclin Universidade
                </button>
                <button data-modal-target="bioclin-pesquisador"
                        data-modal-toggle="bioclin-pesquisador"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #59327f">
                    Bioclin Pesquisador
                </button>
                <button data-modal-target="bioclin-social"
                        data-modal-toggle="bioclin-social"
                        class="block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button"
                        style="background-color: #81b95d">
                    Bioclin Social
                </button>

                <div id="bioclin-jovem" tabindex="-1" aria-hidden="true"
                     class="bg-gray-900/50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#6c3920] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#6c3920]">
                                    Bioclin Jovem Aprendiz
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-jovem">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Jovem Aprendiz vem de uma parceria firmada com o SENAI para
                                    atender o
                                    projeto do Governo Federal e tem como principal objetivo promover a inclusão social
                                    através da qualificação profissional.Os aprendizes têm a oportunidade de vivenciar o
                                    dia
                                    a dia da empresa, participando de sua rotina e processos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bioclin-estagio" tabindex="-1" aria-hidden="true"
                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#d77b2e] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#d77b2e]">
                                    Bioclin Estágio
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-estagio">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Estágio tem como foco firmar parcerias com as instituições de
                                    ensino
                                    para facilitar a entrada dos jovens no mercado de trabalho. Nossos estagiários
                                    vivenciam
                                    o dia a dia da profissão por meio de experiências práticas, participando da rotina e
                                    dos
                                    processos da empresa.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bioclin-tecnico" tabindex="-1" aria-hidden="true"
                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#9b262a] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#9b262a]">
                                    Bioclin Curso Técnico
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-tecnico">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Curso Técnico tem como foco parcerias com as instituições de
                                    ensino
                                    relacionados a ciência laboratorial e ao diagnóstico in vitro. O objetivo é
                                    contribuir
                                    para a formação técnico-científica de novos profissionais através do enriquecimento
                                    das
                                    aulas práticas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bioclin-universidade" tabindex="-1" aria-hidden="true"
                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#404a99] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#404a99]">
                                    Bioclin Universidade
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-universidade">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Universidade tem como foco parcerias com as instituições de
                                    ensino
                                    relacionados a ciência laboratorial e ao diagnóstico in vitro. O objetivo é
                                    contribuir
                                    para a formação técnico-científica de novos profissionais através do enriquecimento
                                    das
                                    aulas práticas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bioclin-pesquisador" tabindex="-1" aria-hidden="true"
                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#59327f] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#59327f]">
                                    Bioclin Pesquisador
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-pesquisador">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Pesquisador tem como foco firmar parcerias com as instituições de
                                    ensino relacionados a ciência laboratorial e ao diagnóstico in vitro para enriquecer
                                    projetos de pesquisas, colaborar com a formação técnico-científica de alunos de
                                    especialização, iniciação científica, mestrado e doutorado.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bioclin-social" tabindex="-1" aria-hidden="true"
                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow border-[#81b95d] border-2">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-[#81b95d]">
                                    Bioclin Social
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="bioclin-social">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500">
                                    O programa Bioclin Social sintetiza a responsabilidade da empresa propondo ações
                                    relacionadas a cidadania e a sustentabilidade para assim garantir a preservação do
                                    meio
                                    ambiente e o bem-estar de seus colaboradores. Além de ajudar às instituições
                                    filantrópicas em parceria com o Lions Clube Pampulha, a Bioclin estimula a
                                    participação
                                    de voluntariados em causas sociais, promove a orientação quanto à prevenção de
                                    doenças e
                                    realiza campanhas internas de vacinação. A empresa também faz a coleta seletiva de
                                    lixo
                                    e doações para a Ascap e Asmare, bem como contribui com a melhoria da qualidade de
                                    vida
                                    de seus colaboradores e familiares, proporcionando condições de trabalho seguro e
                                    saudável.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <section id="contrapartida" class="bg-slate-100 px-2 md:px-12 py-6 shadow-2xl">
            <div class="p-4 leading-8">
                <h1 class="text-2xl font-bold">Contrapartida</h1>
                <div class="p-4 text-justify">
                    <p class="mt-4 font-medium">A instituição de ensino deverá enviar, anualmente e ao final do projeto
                        de pesquisa ou período
                        letivo, um relatório sobre a utilização dos reagentes Bioclin.</p>
                    <p class="mt-4 font-medium">Nos casos das aulas práticas, o relatório deverá ser enviado conforme
                        formulário Retorno - Bioclin
                        Curso Técnico ou Retorno - Bioclin Universidade.</p>
                    <p class="mt-4 font-medium">
                        Em casos de projeto de pesquisa, será o formulário Retorno - Bioclin Pesquisador. Neste também
                        deverá ser anexada a dissertação ou tese resultante ao relatório final. E por fim, a marca
                        Bioclin -
                        Quibasa deverá ser divulgada nos artigos científicos publicados sobre o projeto, sempre que
                        pertinente.
                    </p>
                </div>
            </div>
        </section>

        <section id="inscricoes" class="bg-slate-200 px-2 md:px-12 py-6 shadow-2xl">
            <div class="p-4 leading-8">
                <h1 class="text-2xl font-bold">Inscrições</h1>
                <div class="p-4 text-justify">
                    <p class="mt-4 font-medium">Não haverá uma data limite para inscrições, ou seja, novas solicitações
                        poderão ser submetidas a
                        qualquer tempo. Estas deverão ser feitas, preferencialmente, antes da data prevista para início
                        do
                        período letivo ou do projeto de pesquisa. Após a entrega da solicitação, a proposta será
                        avaliada em
                        até 30 (trinta) dias.</p>
                    <p class="mt-4 font-medium">A instituição interessada poderá entrar em contato com a Bioclin -
                        Quibasa, que enviará, por meio
                        eletrônico, os formulários de inscrição, ou acessar os links abaixo. Depois de preenchido o que
                        melhor se adequa à proposta, este deverá ser enviado, por meio físico ou eletrônico, à Bioclin,
                        para
                        que seja feita a avaliação. A resposta à instituição será feita após a avaliação da empresa.</p>
                    <p class="mt-4 font-medium">
                        Os contatos poderão ser feitos através do telefone (31) 3439-5454 ou através do e-mail:
                        <span class="underline font-semibold text-lg">educar@bioclin.com.br</span>
                    </p>
                </div>
            </div>
        </section>

        <section id="formularios" class="bg-slate-100 px-2 md:px-12 py-6 shadow-2xl">
            <div class="p-4 leading-8">
                <h1 class="text-2xl font-bold">Formulários</h1>
                <div class="p-4 text-justify">
                    <p class="mt-4 font-medium">Abaixo estão os fomulários para preenchimento. Eles são PDFs editáveis
                        para facilitar o seu preenchimento.</p>
                    <ul>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1573245637.pdf"
                               target="_blank">
                                Bioclin Curso Técnico
                            </a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1573245777.pdf"
                               target="_blank">
                                Bioclin Pesquisador
                            </a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574355574.pdf"
                               target="_blank">
                                Bioclin Universidades
                            </a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574355613.pdf"
                               target="_blank">
                                Palestras
                            </a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574355642.pdf"
                               target="_blank">
                                Visitas Técnicas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="formularios-retorno" class="bg-slate-200 px-2 md:px-12 py-6 rounded-b-lg shadow-2xl">
            <div class="p-4 leading-8">
                <h1 class="text-2xl font-bold">Formulários Retorno</h1>
                <div class="p-4 text-justify">
                    <p class="mt-4 font-medium">Abaixo estão os fomulários de retorno para preenchimento. Eles são PDFs
                        editáveis para facilitar o seu preenchimento.</p>
                    <ul>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574873213.pdf"
                               target="_blank">Bioclin Curso Técnico</a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574873446.pdf"
                               target="_blank">Bioclin Pesquisador</a>
                        </li>
                        <li class="list-disc ml-8 p-1">
                            <a class="underline text-blue-700"
                               href="https://loja.bioclin.com.br/index.php/fileuploader/download/download/?d=0&file=custom%2Fupload%2FFile-1574873642.pdf"
                               target="_blank">Bioclin Universidades</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
