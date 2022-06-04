<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Sweet Alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    
    <title>Covid API</title>     
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body class="bg-gray-900">
    <script>
        async function listarEstados() {
            const { value: estado } = await Swal.fire({
            title: 'Selecione um Estado',
            input: 'select',
            inputAttributes: {
                id: 'estadoInput',
            },
            inputOptions: {
                'Estados': {
                AC: 'AC',
                AL: 'AL',
                AP: 'AP',
                AM: 'AM',
                BA: 'BA',
                CE: 'CE',
                ES: 'ES',
                GO: 'GO',
                MA: 'MA',
                MT: 'MT',
                MS: 'MS',
                MG: 'MG',
                PA: 'PA',
                PB: 'PB',
                PR: 'PR',
                PE: 'PE',
                PI: 'PI',
                RJ: 'RJ',
                RN: 'RN',
                RS: 'RS',
                RO: 'RO',
                RR: 'RR',
                SC: 'SC',
                SP: 'SP',
                SE: 'SE',
                TO: 'TO',
                DF: 'DF',
                }
            },
            // inputPlaceholder: 'Select a fruit',
            showCancelButton: true,
        })

            if (estado) {
                window.location.href = `/covid/${estado}`;
            }
        }
    </script>
    <br/>
    <!-- Container -->
    <div class="md:container md:mx-auto">
        <div class="relative overflow-x-auto shadow-md">
            <!-- Tabela de dados-->
            <table id="table1" class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            Casos
                        </th>
                       
                        <th scope="col" class="px-6 py-3">
                            Óbitos
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            Suspeitos
                        </th>
                    </tr>
                </thead>
                 
                @if(!empty($response) && !empty($response['state']))
                    <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 font-mono">
                        <th id="estado" scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap hover:text-sky-400">
                            {{$response['state']}}
                        </th>
                        
                        <td id="casos" class="px-6 py-4 text-slate-400 hover:text-sky-400">
                            {{$response['cases']}}
                        </td>
                        
                        <td id="obitos" class="px-6 py-4 text-slate-400 hover:text-sky-400">
                            {{$response['deaths']}}
                        </td>
                        
                        <td id="suspeitos" class="px-6 py-4 text-slate-400 hover:text-sky-400">
                            {{$response['suspects']}}
                        </td>
                        
                </tbody>
                @endif
            </table><br/><br/>
            <!-- Fim da tabela -->

            <!-- Input de pesquisa API-->
            <div class="code-preview-wrapper font-mono">
                <div class="code-preview bg-gradient-to-r bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-2 sm:p-6 dark:bg-gray-800">
                    <form action="{{url('/covid')}}" method="post">
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <input id="uf" name="uf" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                            <label class="peer-focus:font-medium absolute text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Estado</label>
                        </div>
                    
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Pesquisar
                        </span>
                    </button>

                    <label  onclick="listarEstados()" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Lista de Estados
                        </span>
                    </label>
                    </form>
                </div>
            </div>
            <!-- Fim do Input -->

        </div>
    </div>
    <!-- Container -->
</body>
</html>