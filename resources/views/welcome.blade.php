@extends('layout.main')

@section('page-title', 'Liberfly - Processo Seletivo')

@section('content')
<div class="container">
    <div class="row">
        <!-- Card de Introdução -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Introdução</h4>
                </div>
                <div class="card-body">
                    <p>Desenvolvimento de uma <strong>API RESTful</strong> que interage com um banco de dados MySQL, seguindo boas práticas de segurança, autenticação JWT e retornando respostas no formato JSON. A API foi implementada utilizando <strong>PHP</strong> com o framework <strong>Laravel</strong> e inclui documentação utilizando <strong>Swagger</strong>.</p>
                </div>
            </div>
        </div>

        <!-- Card de Requisitos Atendidos -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Requisitos Atendidos</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Framework:</strong> PHP com Laravel</li>
                        <li><strong>Banco de dados:</strong> MySQL</li>
                        <li><strong>Autenticação:</strong> JWT (Json Web Token)</li>
                        <li><strong>Respostas em formato:</strong> JSON</li>
                        <li><strong>Documentação:</strong> Swagger</li>
                        <li><strong>Testes de Integração:</strong> Implementados para os endpoints principais.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card de Arquitetura da API -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Arquitetura da API</h4>
                </div>
                <div class="card-body">
                    <p><strong>Endpoints Implementados:</strong></p>
                    <ul>
                        <li><strong>Listar todos os registros:</strong> <code>GET /api/produtos</code> - Retorna a lista de todos os produtos cadastrados. Protegido por autenticação JWT.</li>
                        <li><strong>Buscar um registro específico por ID:</strong> <code>GET /api/produtos/{id}</code> - Retorna os detalhes de um produto específico com base no ID. Protegido por autenticação JWT.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card de Autenticação com JWT -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Autenticação com JWT</h4>
                </div>
                <div class="card-body">
                    <p>Implementação de um sistema de autenticação com JWT, garantindo que apenas usuários autenticados possam acessar os endpoints protegidos.</p>
                    <p><strong>Fluxo de autenticação:</strong></p>
                    <ol>
                        <li>O usuário envia suas credenciais (e-mail e senha) para o endpoint de login.</li>
                        <li>A API retorna um token JWT.</li>
                        <li>O usuário utiliza o token em todas as requisições protegidas.</li>
                    </ol>
                    <p>Exemplo de rota de login:</p>
                    <pre><code>Route::post('auth/login', [AuthController::class, 'login']);</code></pre>
                </div>
            </div>
        </div>

        <!-- Card de Testes de Integração -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Testes de Integração</h4>
                </div>
                <div class="card-body">
                    <p>Dois testes de integração foram implementados:</p>
                    <ul>
                        <li><strong>Listar Produtos:</strong> Verifica se a rota de listagem de produtos retorna 5 produtos corretamente.</li>
                        <li><strong>Buscar Produto por ID:</strong> Verifica se ao buscar um produto específico, os detalhes retornados estão corretos.</li>
                    </ul>
                    <p>Exemplo de teste para listar produtos:</p>
                    <pre><code>
                        public function testListarProdutos()
                        {
                            $token = $this->getJwtToken();
                            Produto::factory()->count(5)->create();

                            $response = $this->withHeaders([
                                'Authorization' => 'Bearer ' . $token,
                            ])->get('/api/produtos');

                            $response->assertStatus(200);
                            $response->assertJsonCount(5);
                        }
                    </code></pre>
                </div>
            </div>
        </div>

        <!-- Card de Documentação com Swagger -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Documentação com Swagger</h4>
                </div>
                <div class="card-body">
                    <p>A documentação da API foi gerada utilizando o <strong>Swagger</strong>. Pode ser acessada pelo endpoint <code>/api/documentation</code> ou pela interface gráfica no Swagger UI.</p>
                </div>
            </div>
        </div>

        <!-- Card de Segurança da API -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Segurança da API</h4>
                </div>
                <div class="card-body">
                    <p>A API foi desenvolvida para ser segura, utilizando autenticação JWT para proteger os endpoints. Apenas usuários autenticados têm acesso às funcionalidades críticas, como listagem e visualização de produtos.</p>
                </div>
            </div>
        </div>

        <!-- Card de Considerações Finais -->
        <div class="col-md-12 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Considerações Finais</h4>
                </div>
                <div class="card-body">
                    <p>A API foi desenvolvida seguindo as melhores práticas de segurança e organização. Todos os requisitos do processo seletivo foram atendidos, incluindo:</p>
                    <ul>
                        <li>Autenticação JWT</li>
                        <li>Documentação Swagger</li>
                        <li>Testes de integração</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
