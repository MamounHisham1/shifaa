<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shifaa - Healthcare Management System Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .code-block {
            background: #2d3748;
            border-radius: 8px;
            padding: 1rem;
            overflow-x: auto;
        }
        .nav-link {
            transition: all 0.2s ease;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0, transparent);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold mb-2">شفاء Shifaa</h1>
                    <p class="text-xl opacity-90">Healthcare Management System Documentation</p>
                </div>
                <div class="text-right">
                    <div class="text-sm opacity-75">Version 1.0.0</div>
                    <div class="text-sm opacity-75">Laravel 11 + Vue 3</div>
                    <div class="mt-2">
                        <a href="{{ url('/') }}" class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm transition-colors">
                            ← Back to App
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex space-x-8 overflow-x-auto">
                <a href="#overview" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Overview</a>
                <a href="#architecture" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Architecture</a>
                <a href="#installation" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Installation</a>
                <a href="#api" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">API Reference</a>
                <a href="#frontend" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Frontend</a>
                <a href="#database" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Database</a>
                <a href="#deployment" class="nav-link px-4 py-4 text-sm font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap">Deployment</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <!-- Overview Section -->
        <section id="overview" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Project Overview</h2>
            
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6 card-hover">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">🏥 What is Shifaa?</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Shifaa (شفاء - meaning "healing" in Arabic) is a comprehensive healthcare management system that streamlines the process of booking medical appointments and managing healthcare services. It provides a modern, user-friendly platform for patients to find doctors, book appointments, and manage their healthcare needs.
                    </p>
                </div>
                
                <div class="bg-white rounded-lg shadow-lg p-6 card-hover">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">✨ Key Features</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li>• Doctor search and filtering by specialty</li>
                        <li>• Online appointment booking system</li>
                        <li>• Patient and doctor profile management</li>
                        <li>• Real-time schedule management</li>
                        <li>• Modern responsive web interface</li>
                        <li>• RESTful API architecture</li>
                    </ul>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 border border-blue-200">
                <h3 class="text-xl font-semibold mb-4 text-purple-700">🎯 Target Users</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-2xl mb-2">👥</div>
                        <h4 class="font-semibold">Patients</h4>
                        <p class="text-sm text-gray-600">Book appointments, manage profiles</p>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl mb-2">👨‍⚕️</div>
                        <h4 class="font-semibold">Doctors</h4>
                        <p class="text-sm text-gray-600">Manage schedules, view appointments</p>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl mb-2">🏥</div>
                        <h4 class="font-semibold">Healthcare Providers</h4>
                        <p class="text-sm text-gray-600">Streamline operations</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- Architecture Section -->
        <section id="architecture" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">System Architecture</h2>
            
            <div class="grid lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-600">🔧 Backend (API)</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-medium">Framework</span>
                            <span>Laravel 11 (PHP 8.2+)</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">Database</span>
                            <span>MySQL/PostgreSQL</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-medium">Auth</span>
                            <span>Laravel Sanctum</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm font-medium">Search</span>
                            <span>Laravel Scout</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">🎨 Frontend (SPA)</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-medium">Framework</span>
                            <span>Vue 3 + Vite</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">Styling</span>
                            <span>Tailwind CSS</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm font-medium">State</span>
                            <span>Pinia</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm font-medium">HTTP</span>
                            <span>Axios</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4">🏗️ Project Structure</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold mb-3 text-red-600">Backend (shifaa/)</h4>
                        <div class="code-block text-sm text-gray-300">
<pre><code>shifaa/
├── app/
│   ├── Http/Controllers/Api/V1/
│   ├── Models/
│   ├── Services/
│   └── Http/Resources/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── routes/
│   └── api.php
└── config/</code></pre>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3 text-green-600">Frontend (shifaa-front/)</h4>
                        <div class="code-block text-sm text-gray-300">
<pre><code>shifaa-front/
├── src/
│   ├── views/
│   ├── components/
│   ├── router/
│   ├── stores/
│   └── plugins/
├── public/
└── package.json</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- Installation Section -->
        <section id="installation" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Installation Guide</h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">📋 Prerequisites</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold mb-2">Backend Requirements</h4>
                            <ul class="text-gray-700 space-y-1">
                                <li>• PHP 8.2 or higher</li>
                                <li>• Composer</li>
                                <li>• MySQL/PostgreSQL</li>
                                <li>• Node.js & npm</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Frontend Requirements</h4>
                            <ul class="text-gray-700 space-y-1">
                                <li>• Node.js 18+ & npm</li>
                                <li>• Modern web browser</li>
                                <li>• Git</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-600">🔧 Backend Setup</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-semibold mb-2">1. Clone and Install Dependencies</h4>
                            <div class="code-block">
<pre><code class="language-bash"># Clone the repository
git clone &lt;repository-url&gt; shifaa
cd shifaa

# Install PHP dependencies
composer install

# Install Node dependencies for asset compilation
npm install</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">2. Environment Configuration</h4>
                            <div class="code-block">
<pre><code class="language-bash"># Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shifaa
DB_USERNAME=your_username
DB_PASSWORD=your_password</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">3. Database Setup</h4>
                            <div class="code-block">
<pre><code class="language-bash"># Run migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">4. Start Development Server</h4>
                            <div class="code-block">
<pre><code class="language-bash"># Start all services (API, queue, logs, assets)
composer run dev

# Or start individually
php artisan serve
npm run dev</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">🎨 Frontend Setup</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-semibold mb-2">1. Navigate to Frontend Directory</h4>
                            <div class="code-block">
<pre><code class="language-bash">cd shifaa-front</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">2. Install Dependencies</h4>
                            <div class="code-block">
<pre><code class="language-bash">npm install</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">3. Configure API URL</h4>
                            <div class="code-block">
<pre><code class="language-javascript">// src/plugins/axios.js
axios.defaults.baseURL = 'http://localhost:8000/api'</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-2">4. Start Development Server</h4>
                            <div class="code-block">
<pre><code class="language-bash">npm run dev</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- API Reference Section -->
        <section id="api" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">API Reference</h2>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <span class="text-yellow-600 mr-2">⚠️</span>
                    <span class="text-yellow-800">Base URL: <code class="bg-yellow-100 px-2 py-1 rounded">{{ url('/api/v1') }}</code></span>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Authentication Endpoints -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">🔐 Authentication</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-green-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                                <code>/register</code>
                            </div>
                            <p class="text-gray-600 text-sm">Register a new user account</p>
                            <div class="mt-2 text-sm">
                                <strong>Body:</strong> <code>name, email, password, type</code>
                            </div>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                                <code>/login</code>
                            </div>
                            <p class="text-gray-600 text-sm">Authenticate user and get access token</p>
                            <div class="mt-2 text-sm">
                                <strong>Body:</strong> <code>email, password</code>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctors Endpoints -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-purple-600">👨‍⚕️ Doctors</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-green-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                                <code>/doctors</code>
                            </div>
                            <p class="text-gray-600 text-sm">Get list of all doctors with pagination</p>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                                <code>/doctors/{id}</code>
                            </div>
                            <p class="text-gray-600 text-sm">Get specific doctor details</p>
                        </div>

                        <div class="border-l-4 border-yellow-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                                <code>/search-doctors</code>
                            </div>
                            <p class="text-gray-600 text-sm">Search doctors by name or specialty</p>
                        </div>
                    </div>
                </div>

                <!-- Appointments Endpoints -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-600">📅 Appointments</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-green-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                                <code>/appointments</code>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Auth Required</span>
                            </div>
                            <p class="text-gray-600 text-sm">Get user's appointments</p>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                                <code>/appointments</code>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Auth Required</span>
                            </div>
                            <p class="text-gray-600 text-sm">Create new appointment</p>
                            <div class="mt-2 text-sm">
                                <strong>Body:</strong> <code>schedule_id, patient_id, notes</code>
                            </div>
                        </div>

                        <div class="border-l-4 border-yellow-500 pl-4">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                                <code>/available-dates</code>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Auth Required</span>
                            </div>
                            <p class="text-gray-600 text-sm">Get available appointment dates</p>
                        </div>
                    </div>
                </div>

                <!-- Other Endpoints -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-indigo-600">📋 Other Resources</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold mb-2">Specialties</h4>
                            <ul class="text-sm space-y-1">
                                <li><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">GET</span> <code>/specialties</code></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Schedules</h4>
                            <ul class="text-sm space-y-1">
                                <li><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">GET</span> <code>/schedules</code></li>
                                <li><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">POST</span> <code>/schedules</code></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Patients</h4>
                            <ul class="text-sm space-y-1">
                                <li><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">GET</span> <code>/patients</code></li>
                                <li><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">POST</span> <code>/patients</code></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Profiles</h4>
                            <ul class="text-sm space-y-1">
                                <li><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">GET</span> <code>/profile</code></li>
                                <li><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">PUT</span> <code>/profiles/{id}</code></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- Frontend Section -->
        <section id="frontend" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Frontend Architecture</h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">🎨 Vue 3 Components</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold mb-3">📱 Pages/Views</h4>
                            <ul class="text-sm space-y-1 text-gray-700">
                                <li>• <code>HomeView.vue</code> - Landing page</li>
                                <li>• <code>Login.vue</code> - User authentication</li>
                                <li>• <code>Register.vue</code> - Account registration</li>
                                <li>• <code>Profile.vue</code> - User profile management</li>
                                <li>• <code>Appointment.vue</code> - Booking interface</li>
                                <li>• <code>doctors/ListView.vue</code> - Doctor listings</li>
                                <li>• <code>Services.vue</code> - Healthcare services</li>
                                <li>• <code>Emergency.vue</code> - Emergency contacts</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-3">🧩 Components</h4>
                            <ul class="text-sm space-y-1 text-gray-700">
                                <li>• <code>Nav.vue</code> - Navigation bar</li>
                                <li>• <code>SchedulePicker.vue</code> - Appointment scheduler</li>
                                <li>• <code>Pagination.vue</code> - Data pagination</li>
                                <li>• <code>Loader.vue</code> - Loading indicator</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">🔧 Key Technologies</h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <h4 class="font-semibold text-green-700 mb-2">Vue 3</h4>
                            <p class="text-sm text-gray-600">Composition API, reactive framework</p>
                        </div>
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-semibold text-blue-700 mb-2">Tailwind CSS</h4>
                            <p class="text-sm text-gray-600">Utility-first CSS framework</p>
                        </div>
                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                            <h4 class="font-semibold text-purple-700 mb-2">Pinia</h4>
                            <p class="text-sm text-gray-600">State management store</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-purple-600">🛣️ Routing Structure</h3>
                    <div class="code-block">
<pre><code class="language-javascript">const routes = [
  { path: '/', name: 'home', component: HomeView },
  { path: '/doctors', name: 'doctors', component: DoctorsList },
  { path: '/book-appointment', name: 'book-appointment', component: Appointment },
  { path: '/register', name: 'register', component: Register },
  { path: '/login', name: 'login', component: Login },
  { path: '/profile', name: 'profile', component: Profile },
  { path: '/services', name: 'services', component: Services },
  { path: '/contact', name: 'contact', component: Contact },
  { path: '/emergency', name: 'emergency', component: Emergency }
]</code></pre>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- Database Section -->
        <section id="database" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Database Schema</h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-indigo-600">📊 Entity Relationships</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold mb-3">Core Entities</h4>
                            <ul class="text-sm space-y-2 text-gray-700">
                                <li>• <strong>Users</strong> - System users (patients, doctors, admins)</li>
                                <li>• <strong>Profiles</strong> - Extended user information</li>
                                <li>• <strong>Doctors</strong> - Medical practitioners</li>
                                <li>• <strong>Patients</strong> - Healthcare seekers</li>
                                <li>• <strong>Specialties</strong> - Medical specializations</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-3">Scheduling Entities</h4>
                            <ul class="text-sm space-y-2 text-gray-700">
                                <li>• <strong>Schedules</strong> - Doctor availability</li>
                                <li>• <strong>Slots</strong> - Time slot definitions</li>
                                <li>• <strong>Appointments</strong> - Booked consultations</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-600">🔗 Key Relationships</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold">User → Profile (1:1)</h4>
                            <p class="text-sm text-gray-600">Each user has one profile with extended information</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="font-semibold">Doctor → Specialty (N:1)</h4>
                            <p class="text-sm text-gray-600">Each doctor belongs to one specialty</p>
                        </div>
                        <div class="border-l-4 border-purple-500 pl-4">
                            <h4 class="font-semibold">Doctor → Schedules (1:N)</h4>
                            <p class="text-sm text-gray-600">Each doctor can have multiple schedules</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4">
                            <h4 class="font-semibold">Schedule → Appointments (1:N)</h4>
                            <p class="text-sm text-gray-600">Each schedule can have multiple appointments</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">🌱 Database Seeding</h3>
                    <p class="text-gray-700 mb-4">The system includes comprehensive seeders for development and testing:</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold mb-2">Sample Data</h4>
                            <ul class="text-sm space-y-1 text-gray-700">
                                <li>• 23 Medical specialties</li>
                                <li>• 300 Doctors</li>
                                <li>• 1,000 Patients</li>
                                <li>• 5,000 Schedules</li>
                                <li>• 200 Appointments</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Default Admin</h4>
                            <div class="bg-gray-50 p-3 rounded text-sm">
                                <p><strong>Email:</strong> admin@admin.com</p>
                                <p><strong>Password:</strong> password</p>
                                <p><strong>Type:</strong> admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider mb-16"></div>

        <!-- Deployment Section -->
        <section id="deployment" class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Deployment Guide</h2>
            
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">🚀 Production Deployment</h3>
                    <div class="space-y-4">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <span class="text-yellow-600 mr-2">⚠️</span>
                                <span class="text-yellow-800">Before deploying to production, ensure you configure the following:</span>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-3">Backend Configuration</h4>
                            <div class="code-block">
<pre><code class="language-bash"># Set production environment
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Configure database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-secure-password

# Set secure app key
php artisan key:generate

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev</code></pre>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-3">Frontend Configuration</h4>
                            <div class="code-block">
<pre><code class="language-javascript">// Update API URL in src/plugins/axios.js
axios.defaults.baseURL = 'https://your-api-domain.com/api'

// Build for production
npm run build</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-green-600">📋 Production Checklist</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold mb-3">Security</h4>
                            <ul class="text-sm space-y-1 text-gray-700">
                                <li>☐ SSL certificate installed</li>
                                <li>☐ Environment variables secured</li>
                                <li>☐ Database credentials protected</li>
                                <li>☐ CORS configured properly</li>
                                <li>☐ Rate limiting enabled</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-3">Performance</h4>
                            <ul class="text-sm space-y-1 text-gray-700">
                                <li>☐ Laravel caches optimized</li>
                                <li>☐ Frontend assets minified</li>
                                <li>☐ Database indexed</li>
                                <li>☐ CDN configured</li>
                                <li>☐ Monitoring setup</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-purple-600">🐳 Docker Deployment (Optional)</h3>
                    <p class="text-gray-700 mb-4">For containerized deployment, you can create Docker configurations:</p>
                    <div class="code-block">
<pre><code class="language-dockerfile"># Dockerfile example for Laravel
FROM php:8.2-fpm
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install --optimize-autoloader --no-dev</code></pre>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white rounded-lg p-8 text-center">
            <h3 class="text-xl font-semibold mb-4">🏥 Shifaa Healthcare Management System</h3>
            <p class="text-gray-300 mb-4">A comprehensive solution for modern healthcare appointment management</p>
            <div class="flex justify-center space-x-6 text-sm">
                <span>Laravel 11</span>
                <span>•</span>
                <span>Vue 3</span>
                <span>•</span>
                <span>Tailwind CSS</span>
                <span>•</span>
                <span>MySQL</span>
            </div>
            <div class="mt-4 text-gray-400 text-sm">
                Documentation generated for Shifaa v1.0.0
            </div>
        </footer>
    </div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Highlight active navigation item
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-blue-600', 'font-semibold');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-blue-600', 'font-semibold');
                }
            });
        });
    </script>
</body>
</html> 