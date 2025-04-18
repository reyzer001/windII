<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <img src="https://ui-avatars.com/api/?name=Alex+T+Ruben&background=6366F1&color=fff" alt="User avatar" class="h-8 w-8 rounded-full">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Alex T. Ruben</span>
                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6" x-data="financialData()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Navigation Tabs -->
            <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <a href="#" class="inline-flex items-center px-4 py-2 border-b-2 border-indigo-500 text-indigo-600 rounded-t-lg active dark:text-indigo-400 dark:border-indigo-400 group">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>Sales VS. Labor
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-flex items-center px-4 py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>Who's Working?
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-flex items-center px-4 py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>Location Overview
                        </a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex items-center px-4 py-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>Engage Overview
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Ringkasan Keuangan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Onboarde team -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-blue-500 bg-blue-100 rounded-full p-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                                </span>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Onboarde team</h3>
                            </div>
                            <span class="text-xs text-gray-500">!</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-200" x-text="formatNumber(profitLoss.value)"></div>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full" x-text="'+' + profitLoss.percentage + '%'">+21.5%</span>
                        </div>
                        <div class="mt-4 h-40">
                            <canvas id="profit-loss-chart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Time & clocking -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-yellow-500 bg-yellow-100 rounded-full p-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Time & clocking</h3>
                            </div>
                            <span class="text-xs text-gray-500">!</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-200">Average 8.5h</div>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">+45%</span>
                        </div>
                        <div class="mt-4 h-40 flex justify-center items-center">
                            <canvas id="cash-balance-chart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Connect POS -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-red-500 bg-red-100 rounded-full p-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Connect POS</h3>
                            </div>
                            <span class="text-xs text-gray-500">!</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-200">Square & Clover</div>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">+153%</span>
                        </div>
                        <div class="mt-4 h-40 flex justify-between items-center">
                            <div class="w-1/2 h-full flex items-center justify-center">
                                <div class="h-20 w-4 bg-blue-500 rounded-sm mx-1"></div>
                                <div class="h-32 w-4 bg-blue-500 rounded-sm mx-1"></div>
                                <div class="h-24 w-4 bg-blue-500 rounded-sm mx-1"></div>
                            </div>
                            <div class="w-1/2 h-full flex items-center justify-center">
                                <div class="h-16 w-4 bg-red-500 rounded-sm mx-1"></div>
                                <div class="h-28 w-4 bg-red-500 rounded-sm mx-1"></div>
                                <div class="h-20 w-4 bg-red-500 rounded-sm mx-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Balance Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Balance</h3>
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">+2.99%</span>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">USD 21,546.55</div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Deposits</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">USD 21,546.55</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Expenses</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">USD 21,546.55</p>
                                </div>
                            </div>
                            <div class="h-40">
                                <canvas id="balance-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Wallet -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Wallet</h3>
                                <div class="flex items-center justify-between">
                                    <div class="w-1/2">
                                        <div class="h-40 flex justify-center items-center">
                                            <div class="relative w-40 h-40">
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <div class="text-center">
                                                        <div class="text-xl font-bold text-indigo-600">+2.99%</div>
                                                    </div>
                                                </div>
                                                <canvas id="wallet-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/2">
                                        <div class="space-y-4">
                                            <div class="flex items-center">
                                                <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                                                <div class="flex-1">
                                                    <div class="flex justify-between">
                                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Burger</span>
                                                        <span class="text-sm font-medium text-green-600">+2.98%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                                <div class="flex-1">
                                                    <div class="flex justify-between">
                                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Chicken</span>
                                                        <span class="text-sm font-medium text-green-600">+3.99%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                                                <div class="flex-1">
                                                    <div class="flex justify-between">
                                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Chicken roll</span>
                                                        <span class="text-sm font-medium text-green-600">+2.99%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Earnings -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Earnings</h3>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-gray-500">Month:</span>
                                        <select class="text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option>June</option>
                                            <option>May</option>
                                            <option>April</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">$22,800</div>
                                <div class="flex space-x-4 mb-4">
                                    <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">Sales</span>
                                    <span class="px-2 py-1 text-xs font-semibold text-orange-800 bg-orange-100 rounded-full">Profit</span>
                                    <span class="px-2 py-1 text-xs font-semibold text-purple-800 bg-purple-100 rounded-full">Surgery</span>
                                </div>
                                <div class="h-40" id="earnings-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Performance Metrics -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Avg. Sales -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-green-500 bg-green-100 rounded-full p-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Avg. Sales</h3>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">+5%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">30,000</div>
                        </div>
                        <div class="mt-4 h-20" id="avg-sales-chart"></div>
                    </div>
                </div>
                
                <!-- Avg. No Shows -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-red-500 bg-red-100 rounded-full p-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Avg. No Shows</h3>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">-5%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">10,000</div>
                        </div>
                        <div class="mt-4 h-20" id="avg-no-shows-chart"></div>
                    </div>
                </div>
                
                <!-- Avg. Dropped -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-yellow-500 bg-yellow-100 rounded-full p-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                </span>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Avg. Dropped</h3>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">+5%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">20,000</div>
                        </div>
                        <div class="mt-4 h-20" id="avg-dropped-chart"></div>
                    </div>
                </div>
            </div>
            
            <!-- Pending Request & Activity Log -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Pending Request -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Pending Request</h3>
                            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">See All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full mr-2" src="https://ui-avatars.com/api/?name=Thad+Eddings&background=6366F1&color=fff" alt="">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Thad Eddings</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">Product Designer</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <span class="flex-shrink-0 h-4 w-4 rounded-full bg-green-500 mr-1"></span>
                                                <span class="text-sm text-gray-900 dark:text-gray-100">South Africa</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Processing</span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <button class="text-gray-400 hover:text-gray-500">...</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full mr-2" src="https://ui-avatars.com/api/?name=Thad+Eddings&background=EF4444&color=fff" alt="">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Thad Eddings</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">Product Designer</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <span class="flex-shrink-0 h-4 w-4 rounded-full bg-blue-500 mr-1"></span>
                                                <span class="text-sm text-gray-900 dark:text-gray-100">South Africa</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Processing</span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <button class="text-gray-400 hover:text-gray-500">...</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Activity Log -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Activity Log</h3>
                            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">See All</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="relative">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Thad+Eddings&background=6366F1&color=fff" alt="">
                                        <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        <a href="#" class="hover:underline">Thad Eddings</a>
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        $2700.00 was paid via Credit card from the webshop
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        10:59
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="relative">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Thad+Eddings&background=EF4444&color=fff" alt="">
                                        <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        <a href="#" class="hover:underline">Thad Eddings</a>
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        $2700.00 was paid via Credit card from the webshop
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        10:59
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function financialData() {
            return {
                // Data keuangan yang akan diperbarui secara real-time
                profitLoss: {
                    value: 25000000,
                    percentage: 21.5,
                    history: [18000000, 20000000, 22000000, 23000000, 24000000, 25000000]
                },
                cashBalance: {
                    total: 75000000,
                    accounts: [
                        { name: 'Kas Utama', value: 15000000 },
                        { name: 'Bank BCA', value: 35000000 },
                        { name: 'Bank Mandiri', value: 25000000 }
                    ]
                },
                debtCredit: {
                    receivables: 45000000,
                    payables: 30000000,
                    history: [
                        { month: 'Jan', receivables: 40000000, payables: 35000000 },
                        { month: 'Feb', receivables: 42000000, payables: 34000000 },
                        { month: 'Mar', receivables: 43000000, payables: 32000000 },
                        { month: 'Apr', receivables: 44000000, payables: 31000000 },
                        { month: 'Mei', receivables: 45000000, payables: 30000000 },
                        { month: 'Jun', receivables: 45000000, payables: 30000000 }
                    ]
                },
                walletData: {
                    burger: 28.9,
                    chicken: 39.9,
                    chickenRoll: 29.9
                },
                
                // Format angka dengan pemisah ribuan
                formatNumber(number) {
                    return new Intl.NumberFormat('id-ID').format(number);
                },
                
                // Inisialisasi chart saat komponen dimuat
                init() {
                    this.initProfitLossChart();
                    this.initCashBalanceChart();
                    this.initDebtCreditChart();
                    this.initSalesExpensesChart();
                    this.initCashFlowChart();
                    
                    // Simulasi pembaruan data secara real-time
                    this.setupRealtimeUpdates();
                },
                
                // Inisialisasi chart laba rugi
                initProfitLossChart() {
                    const ctx = document.getElementById('profit-loss-chart').getContext('2d');
                    this.profitLossChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                            datasets: [{
                                label: 'Laba Rugi',
                                data: this.profitLoss.history,
                                borderColor: 'rgb(34, 197, 94)',
                                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + (value / 1000000) + ' jt';
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                
                // Inisialisasi chart saldo kas
                initCashBalanceChart() {
                    const ctx = document.getElementById('cash-balance-chart').getContext('2d');
                    this.cashBalanceChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: this.cashBalance.accounts.map(account => account.name),
                            datasets: [{
                                data: this.cashBalance.accounts.map(account => account.value),
                                backgroundColor: [
                                    'rgba(59, 130, 246, 0.8)',
                                    'rgba(16, 185, 129, 0.8)',
                                    'rgba(99, 102, 241, 0.8)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: (context) => {
                                            const value = context.raw;
                                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                            const percentage = Math.round((value / total) * 100);
                                            return `Rp ${this.formatNumber(value)} (${percentage}%)`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                
                // Inisialisasi chart hutang piutang
                initDebtCreditChart() {
                    const ctx = document.getElementById('debt-credit-chart').getContext('2d');
                    this.debtCreditChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: this.debtCredit.history.map(item => item.month),
                            datasets: [
                                {
                                    label: 'Piutang',
                                    data: this.debtCredit.history.map(item => item.receivables),
                                    backgroundColor: 'rgba(99, 102, 241, 0.8)',
                                    borderColor: 'rgb(99, 102, 241)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Hutang',
                                    data: this.debtCredit.history.map(item => item.payables),
                                    backgroundColor: 'rgba(239, 68, 68, 0.8)',
                                    borderColor: 'rgb(239, 68, 68)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + (value / 1000000) + ' jt';
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                
                // Inisialisasi chart penjualan & pengeluaran
                initSalesExpensesChart() {
                    const salesExpensesCtx = document.getElementById('sales-expenses-chart').getContext('2d');
                    this.salesExpensesChart = new Chart(salesExpensesCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                            datasets: [
                                {
                                    label: 'Penjualan',
                                    data: [45, 59, 80, 81, 56, 55],
                                    backgroundColor: '#60a5fa',
                                    borderColor: '#3b82f6',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Pengeluaran',
                                    data: [28, 48, 40, 19, 36, 27],
                                    backgroundColor: '#f87171',
                                    borderColor: '#ef4444',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + value + ' jt';
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                
                // Inisialisasi chart arus kas
                initCashFlowChart() {
                    const cashFlowCtx = document.getElementById('cash-flow-chart').getContext('2d');
                    this.cashFlowChart = new Chart(cashFlowCtx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                            datasets: [{
                                label: 'Arus Kas',
                                data: [30, 45, 35, 60, 50, 75],
                                fill: true,
                                backgroundColor: 'rgba(34, 197, 94, 0.2)',
                                borderColor: 'rgb(34, 197, 94)',
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + value + ' jt';
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                
                // Simulasi pembaruan data secara real-time
                setupRealtimeUpdates() {
                    // Simulasi perubahan data setiap 10 detik
                    setInterval(() => {
                        // Simulasi perubahan laba rugi
                        const profitChange = Math.random() * 2000000 - 1000000;
                        this.profitLoss.value = Math.max(0, this.profitLoss.value + profitChange);
                        this.profitLoss.percentage = Math.round((profitChange / this.profitLoss.value) * 100);
                        
                        // Update history laba rugi
                        this.profitLoss.history.shift();
                        this.profitLoss.history.push(this.profitLoss.value);
                        this.profitLossChart.data.datasets[0].data = this.profitLoss.history;
                        this.profitLossChart.update();
                        
                        // Simulasi perubahan saldo kas
                        for (let i = 0; i < this.cashBalance.accounts.length; i++) {
                            const change = Math.random() * 1000000 - 500000;
                            this.cashBalance.accounts[i].value = Math.max(0, this.cashBalance.accounts[i].value + change);
                        }
                        this.cashBalance.total = this.cashBalance.accounts.reduce((sum, account) => sum + account.value, 0);
                        this.cashBalanceChart.data.datasets[0].data = this.cashBalance.accounts.map(account => account.value);
                        this.cashBalanceChart.update();
                        
                        // Simulasi perubahan hutang piutang
                        const receivablesChange = Math.random() * 1000000 - 300000;
                        const payablesChange = Math.random() * 1000000 - 700000;
                        this.debtCredit.receivables = Math.max(0, this.debtCredit.receivables + receivablesChange);
                        this.debtCredit.payables = Math.max(0, this.debtCredit.payables + payablesChange);
                        
                        // Update history hutang piutang
                        const lastMonth = this.debtCredit.history[this.debtCredit.history.length - 1].month;
                        this.debtCredit.history.shift();
                        this.debtCredit.history.push({
                            month: lastMonth,
                            receivables: this.debtCredit.receivables,
                            payables: this.debtCredit.payables
                        });
                        this.debtCreditChart.data.datasets[0].data = this.debtCredit.history.map(item => item.receivables);
                        this.debtCreditChart.data.datasets[1].data = this.debtCredit.history.map(item => item.payables);
                        this.debtCreditChart.update();
                    }, 10000); // Update setiap 10 detik
                }
            };
        }
        
        // Inisialisasi chart lain saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', function() {
            // Chart.js sudah diinisialisasi melalui Alpine.js
        });
    </script>
    @endpush
</x-app-layout>
