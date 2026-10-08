<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Painel de Telemetria' }}</title>
    
    <!-- CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Estilos globais do Livewire -->
    @livewireStyles
</head>
<body class="bg-light">

    <!-- NAVBAR GLOBAL -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm border-bottom border-primary border-2 py-3">
        <div class="container">
            <!-- Brand / Logo com ícone e texto em destaque -->
            <a class="navbar-brand fw-bold fs-4 d-flex align-items-center" href="/">
                <span class="me-2 text-warning">⚡</span> 
                <span class="text-white">Telemetria</span>
                <span class="text-primary ms-1">IoT</span>
            </a>
            
            <!-- Botão do menu hambúrguer para telas de celular -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGlobal" aria-controls="navbarGlobal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links de Navegação -->
            <div class="collapse navbar-collapse" id="navbarGlobal">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link active px-3" href="/dashboard">📊 Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-white-50" href="ambientes.index">🏢 Ambientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-white-50" href="/sensor/index">🔌 Sensores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-white-50" href="#">📋 Registros</a>
                    </li>
                </ul>
                
                <!-- Indicador de Status do Sistema no Canto Direito -->
                <div class="d-flex ms-lg-3 mt-2 mt-lg-0 align-items-center">
                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill border border-success d-flex align-items-center">
                        <span class="spinner-grow spinner-grow-sm text-success me-2" role="status" style="animation-duration: 1.5s;"></span>
                        Online
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO DINÂMICO DAS VIEWS (Onde o Livewire vai injetar o Dashboard) -->
    <main>
        {{ $slot }}
    </main>

    <!-- Scripts globais do Livewire -->
    @livewireScripts

    <!-- JS do Bootstrap (Essencial para o funcionamento do menu do celular) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
