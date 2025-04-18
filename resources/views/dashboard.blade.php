<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wind</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        aside {
            background-color: white;
            border-right: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .sidebar-link {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            border-radius: 0.375rem;
            transition: all 0.3s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .sidebar-link svg {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.75rem;
        }
        .stat-card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.25rem;
            transition: all 0.3s;
        }
        .stat-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        .chart-container {
            height: 300px;
            position: relative;
        }
        .table-container {
            overflow-x: auto;
        }
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-paid {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .badge-overdue {
            background-color: #fee2e2;
            color: #b91c1c;
        }
    </style>
</head>
<body class="h-screen flex overflow-hidden" x-data="{ sidebarOpen: true, orderSubmenuOpen: false, profileSubmenuOpen: false }">
    <!-- Sidebar -->
    <aside class="relative h-full flex flex-col transition-all duration-300" :class="sidebarOpen ? 'w-64' : 'w-16'">
        <!-- Toggle button -->
        <button @click="sidebarOpen = !sidebarOpen" class="absolute -right-3 top-10 bg-white rounded-full p-1 shadow-md z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="sidebarOpen ? 'rotate-0' : 'rotate-180'">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <!-- Logo -->
        <div class="p-4 flex items-center justify-center">
            <template x-if="sidebarOpen">
                <a href="/" class="flex items-center">
                    <svg class="h-6 w-6 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-2 text-lg font-semibold text-gray-800">voltra</span>
                </a>
            </template>
            <template x-if="!sidebarOpen">
                <a href="/" class="flex items-center justify-center">
                    <svg class="h-6 w-6 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </a>
            </template>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-6 flex-1 px-2 space-y-1 overflow-y-auto">
            <!-- Dashboard -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Dashboard</span>
            </a>
            
            <!-- Jurnal Umum -->
            <a href="{{ route('journal.index') }}" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Jurnal Umum</span>
            </a>
            
            <!-- Chat -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <div class="relative">
                    <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-green-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </div>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Chat</span>
            </a>
            
            <!-- Purchasing -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Purchasing</span>
            </a>
            
            <!-- Orders with submenu -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="orderSubmenuOpen = !orderSubmenuOpen" class="w-full flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                    <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Orders</span>
                    <svg x-show="sidebarOpen" class="ml-auto h-4 w-4 text-gray-500 transition-transform duration-200" :class="orderSubmenuOpen ? 'rotate-90' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="sidebarOpen && orderSubmenuOpen" class="pl-8 mt-1 space-y-1" style="display: none;">
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <span class="w-2 h-2 rounded-full bg-yellow-500 mr-2"></span>
                        <span>Pending</span>
                    </a>
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                        <span>Completed</span>
                    </a>
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>
                        <span>Cancelled</span>
                        <span class="ml-auto bg-gray-200 text-gray-800 text-xs rounded-full px-2 py-0.5">8</span>
                    </a>
                </div>
            </div>
            
            <!-- Pricing -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Pricing</span>
            </a>
            
            <!-- Shipping -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Shipping</span>
            </a>
            
            <!-- Plans -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Plans</span>
            </a>
        </nav>
        
        <!-- Bottom section -->
        <div class="p-2 mt-auto">
            <!-- Help -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Help</span>
            </a>
            
            <!-- Settings -->
            <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">Settings</span>
            </a>
            
            <!-- User profile -->
            <div class="relative mt-2" x-data="{ open: false }" @click.away="profileSubmenuOpen = false">
                <button @click="profileSubmenuOpen = !profileSubmenuOpen" class="w-full flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                    <div class="relative flex-shrink-0">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                        <span class="absolute bottom-0 right-0 h-2 w-2 rounded-full bg-green-500 ring-1 ring-white"></span>
                    </div>
                    <div class="ml-3 transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 hidden'">
                        <p class="text-sm font-medium">Les Tien</p>
                        <p class="text-xs text-gray-500">les.tien@example.com</p>
                    </div>
                    <svg x-show="sidebarOpen" class="ml-auto h-4 w-4 text-gray-500 transition-transform duration-200" :class="profileSubmenuOpen ? 'rotate-90' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="sidebarOpen && profileSubmenuOpen" class="pl-8 mt-1 space-y-1" style="display: none;">
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <svg class="h-4 w-4 text-gray-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>My profile</span>
                    </a>
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <svg class="h-4 w-4 text-gray-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span>Analytics</span>
                    </a>
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <svg class="h-4 w-4 text-gray-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Account settings</span>
                    </a>
                    <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 group">
                        <svg class="h-4 w-4 text-gray-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Sign out</span>
                    </a>
                </div>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        <div class="p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold">Welcome Back, {{ Auth::user()->name }} 👋</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search anything..." class="bg-gray-100 rounded-lg pl-10 pr-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                    <div class="relative" x-data="{ open: false }">
                        <div class="flex items-center cursor-pointer" @click="open = !open">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="h-8 w-8 rounded-full">
                            <div class="ml-2 flex items-center">
                                <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </div>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Customers</p>
                            <h3 class="text-2xl font-bold">1,456</h3>
                            <p class="text-sm text-green-500 mt-1">+6.5% Since last week</p>
                        </div>
                        <div class="p-2 rounded-lg bg-indigo-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Revenue</p>
                            <h3 class="text-2xl font-bold">$3,345</h3>
                            <p class="text-sm text-red-500 mt-1">-0.10% Since last week</p>
                        </div>
                        <div class="p-2 rounded-lg bg-cyan-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Conversion Rate</p>
                            <h3 class="text-2xl font-bold">60%</h3>
                            <p class="text-sm text-red-500 mt-1">-0.2% Since last week</p>
                        </div>
                        <div class="p-2 rounded-lg bg-purple-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Invoices</p>
                            <h3 class="text-2xl font-bold">1,135</h3>
                            <p class="text-sm text-green-500 mt-1">+11.5% Since last week</p>
                        </div>
                        <div class="p-2 rounded-lg bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Invoice Statistics -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold">Invoice Statistics</h2>
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/3">
                            <div class="mb-4">
                                <p class="text-sm text-gray-500 mb-1">Total Paid</p>
                                <h3 class="text-xl font-bold">234</h3>
                            </div>
                            <div class="mb-4">
                                <p class="text-sm text-gray-500 mb-1">Total Overdue</p>
                                <h3 class="text-xl font-bold">514</h3>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Pending</p>
                                <h3 class="text-xl font-bold">345</h3>
                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="chart-container">
                                <canvas id="cash-balance-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Analytics -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold">Sales Analytics</h2>
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="market-overview-chart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Invoices -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold">Recent Invoices</h2>
                    <div class="flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="table-container">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID/Customer</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/42.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">#ID-0001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">John Tengan</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Medium Backpack</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">21/01/2022 08:21</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="badge badge-paid">Paid</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$101</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/women/24.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">#ID-0002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Lara Andersen</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Medium Backpack</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">21/01/2022 08:21</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="badge badge-pending">Pending</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$144</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/36.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">#ID-0003</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Elmer Brown</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Mini Backpack</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">21/01/2022 08:21</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="badge badge-paid">Paid</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$121</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">4</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">#ID-0004</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Patricia Reiss</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">2x Maxi Backpack</div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">21/01/2022 08:21</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="badge badge-overdue">Overdue</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$300</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Load Chart.js and initialize charts -->
    <script src="/js/dashboard-charts.js"></script>
</body>
</html>