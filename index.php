<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas - Laravel PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; }
        .vista { display: none; animation: fadeIn 0.3s ease-in-out; }
        .vista.activa { display: block; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>
<body class="h-screen w-full flex flex-col">

    <!-- BARRA DE CONTROL (Solo para tomar los pantallazos fácilmente) -->
    <div class="bg-gray-800 text-white p-2 flex justify-center gap-4 text-sm font-bold shadow-md z-50">
        <span class="mr-4 text-gray-400">Controles de Pantalla:</span>
        <button onclick="mostrarVista('login')" class="hover:text-blue-400 transition"><i class="fas fa-sign-in-alt"></i> 1. Ver Login</button>
        <button onclick="mostrarVista('dashboard')" class="hover:text-blue-400 transition"><i class="fas fa-chart-line"></i> 2. Ver Dashboard</button>
        <button onclick="mostrarVista('pacientes')" class="hover:text-blue-400 transition"><i class="fas fa-users"></i> 3. Ver Pacientes</button>
        <button onclick="mostrarVista('citas')" class="hover:text-blue-400 transition"><i class="fas fa-calendar-check"></i> 4. Ver Citas</button>
    </div>

    <div class="flex-1 relative overflow-hidden flex items-center justify-center">

        <!-- ========================================== -->
        <!-- MÓDULO 1: LOGIN                            -->
        <!-- ========================================== -->
        <div id="login" class="vista activa w-full max-w-md bg-white p-8 rounded-xl shadow-2xl border border-gray-100">
            <div class="text-center mb-8">
                <i class="fas fa-hospital-user text-5xl text-blue-600 mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-800">MediCitas Pro</h2>
                <p class="text-gray-500 text-sm mt-2">Plataforma de Gestión Médica</p>
            </div>
            <form>
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
                    <input type="email" value="admin@medicitas.com" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:bg-white focus:outline-none" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                    <input type="password" value="********" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:bg-white focus:outline-none" required>
                </div>
                <button type="button" class="w-full block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Ingresar al Sistema
                </button>
            </form>
        </div>

        <!-- LAYOUT PARA EL RESTO DE VISTAS (Simulando estar dentro de la app) -->
        <div id="app-layout" class="vista w-full h-full flex">
            <!-- Sidebar -->
            <div class="w-64 bg-slate-900 text-white flex flex-col">
                <div class="p-6 text-center border-b border-slate-700">
                    <i class="fas fa-hospital-user text-3xl text-blue-400 mb-2"></i>
                    <h2 class="font-bold text-lg">MediCitas Pro</h2>
                </div>
                <div class="p-4 flex-1 space-y-2">
                    <div class="bg-blue-600 text-white p-3 rounded-lg cursor-pointer"><i class="fas fa-home w-6"></i> Inicio</div>
                    <div class="hover:bg-slate-800 p-3 rounded-lg cursor-pointer text-slate-300"><i class="fas fa-users w-6"></i> Pacientes</div>
                    <div class="hover:bg-slate-800 p-3 rounded-lg cursor-pointer text-slate-300"><i class="fas fa-calendar-alt w-6"></i> Agenda</div>
                </div>
            </div>
            
            <!-- Contenido Principal -->
            <div class="flex-1 bg-gray-100 flex flex-col h-full overflow-hidden">
                <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                    <h2 class="font-bold text-gray-700 text-xl" id="header-title">Dashboard</h2>
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-bold text-gray-600">Dr. Jorge Arévalo</span>
                        <div class="w-10 h-10 rounded-full bg-blue-100 border-2 border-blue-500 flex items-center justify-center text-blue-700 font-bold">JA</div>
                    </div>
                </header>

                <div class="p-8 flex-1 overflow-y-auto relative">
                    
                    <!-- ========================================== -->
                    <!-- MÓDULO 2: DASHBOARD                        -->
                    <!-- ========================================== -->
                    <div id="dashboard" class="vista w-full h-full">
                        <div class="grid grid-cols-3 gap-6 mb-8">
                            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 flex justify-between items-center">
                                <div>
                                    <p class="text-gray-500 text-sm font-bold">Citas Hoy</p>
                                    <h3 class="text-3xl font-bold text-gray-800">12</h3>
                                </div>
                                <i class="fas fa-calendar-check text-4xl text-blue-200"></i>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500 flex justify-between items-center">
                                <div>
                                    <p class="text-gray-500 text-sm font-bold">Pacientes Nuevos</p>
                                    <h3 class="text-3xl font-bold text-gray-800">4</h3>
                                </div>
                                <i class="fas fa-user-plus text-4xl text-green-200"></i>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-500 flex justify-between items-center">
                                <div>
                                    <p class="text-gray-500 text-sm font-bold">En Espera</p>
                                    <h3 class="text-3xl font-bold text-gray-800">3</h3>
                                </div>
                                <i class="fas fa-clock text-4xl text-purple-200"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-gray-100"><h3 class="font-bold text-gray-700">Próximos Turnos</h3></div>
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-gray-500 text-sm">
                                    <tr><th class="p-4">Hora</th><th class="p-4">Paciente</th><th class="p-4">Motivo</th><th class="p-4">Estado</th></tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm">
                                    <tr class="border-b border-gray-50">
                                        <td class="p-4 font-bold">08:00 AM</td><td class="p-4">Carlos Rodríguez</td><td class="p-4">Revisión General</td>
                                        <td class="p-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">En Consultorio</span></td>
                                    </tr>
                                    <tr class="border-b border-gray-50">
                                        <td class="p-4 font-bold">09:30 AM</td><td class="p-4">María Fernanda Pérez</td><td class="p-4">Odontología</td>
                                        <td class="p-4"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">En Sala de Espera</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- MÓDULO 3: GESTIÓN DE PACIENTES             -->
                    <!-- ========================================== -->
                    <div id="pacientes" class="vista w-full h-full">
                        <div class="bg-white p-8 rounded-xl shadow-sm w-full max-w-4xl mx-auto">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4"><i class="fas fa-user-injured text-blue-600 mr-2"></i> Registrar Nuevo Paciente</h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Documento de Identidad</label><input type="text" class="w-full p-3 border rounded-lg bg-gray-50" placeholder="Ej. 10123456"></div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Nombres Completos</label><input type="text" class="w-full p-3 border rounded-lg bg-gray-50" placeholder="Ej. Juan Pablo"></div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Apellidos</label><input type="text" class="w-full p-3 border rounded-lg bg-gray-50" placeholder="Ej. Gómez"></div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Teléfono de Contacto</label><input type="text" class="w-full p-3 border rounded-lg bg-gray-50" placeholder="Ej. 3001234567"></div>
                            </div>
                            <div class="mt-8 flex justify-end gap-4">
                                <button class="px-6 py-2 border border-gray-300 text-gray-600 font-bold rounded-lg hover:bg-gray-50">Cancelar</button>
                                <button class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700"><i class="fas fa-save mr-2"></i> Guardar Paciente</button>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- MÓDULO 4: AGENDAMIENTO DE CITAS            -->
                    <!-- ========================================== -->
                    <div id="citas" class="vista w-full h-full">
                        <div class="bg-white p-8 rounded-xl shadow-sm w-full max-w-4xl mx-auto">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4"><i class="fas fa-calendar-plus text-emerald-600 mr-2"></i> Agendar Cita Médica</h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2"><label class="block text-sm font-bold text-gray-700 mb-2">Buscar Paciente</label><input type="text" class="w-full p-3 border rounded-lg bg-gray-50" value="Carlos Rodríguez (CC: 10123456)"></div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Especialidad Requerida</label>
                                    <select class="w-full p-3 border rounded-lg bg-gray-50">
                                        <option>Medicina General</option>
                                        <option>Odontología</option>
                                        <option>Pediatría</option>
                                    </select>
                                </div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Médico Asignado</label>
                                    <select class="w-full p-3 border rounded-lg bg-gray-50">
                                        <option>Dr. Jorge Arévalo</option>
                                        <option>Dra. Elena Ruiz</option>
                                    </select>
                                </div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Fecha de la Cita</label><input type="date" class="w-full p-3 border rounded-lg bg-gray-50"></div>
                                <div><label class="block text-sm font-bold text-gray-700 mb-2">Hora de Atención</label><input type="time" class="w-full p-3 border rounded-lg bg-gray-50"></div>
                            </div>
                            <div class="mt-8 flex justify-end gap-4">
                                <button class="px-6 py-2 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700"><i class="fas fa-check-circle mr-2"></i> Confirmar Agendamiento</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Script para cambiar las vistas usando los botones de arriba -->
    <script>
        function mostrarVista(vistaId) {
            // Ocultar todas las vistas
            document.querySelectorAll('.vista').forEach(el => el.classList.remove('activa'));
            
            if (vistaId === 'login') {
                document.getElementById('login').classList.add('activa');
            } else {
                // Mostrar el layout de la app y la vista seleccionada adentro
                document.getElementById('app-layout').classList.add('activa');
                document.getElementById(vistaId).classList.add('activa');
                
                // Actualizar el título del header según la vista
                const titulos = {
                    'dashboard': 'Panel Principal',
                    'pacientes': 'Módulo de Pacientes',
                    'citas': 'Módulo de Agendamiento'
                };
                document.getElementById('header-title').innerText = titulos[vistaId];
            }
        }
    </script>
</body>
</html>