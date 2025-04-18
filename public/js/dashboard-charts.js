// Dashboard Charts - TableTrek Design Implementation

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all charts when DOM is fully loaded
    initializeCharts();
});

function initializeCharts() {
    // Set Chart.js defaults for consistent styling
    Chart.defaults.font.family = '"Inter", sans-serif';
    Chart.defaults.font.size = 12;
    Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(53, 71, 125, 0.8)';
    Chart.defaults.plugins.legend.display = false;
    
    // Initialize all individual charts
    initProfitLossChart();
    initCashBalanceChart();
    initBalanceChart();
    initWalletChart();
    initEarningsChart();
    initMarketOverviewChart();
    
    // Additional charts can be added here
}

// Profit Loss Chart (Onboarded Team)
function initProfitLossChart() {
    const ctx = document.getElementById('profit-loss-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Team Growth',
                data: [12, 19, 15, 20, 25, 30],
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#4F46E5',
                pointRadius: 3,
                pointHoverRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        stepSize: 10
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Team members: ${context.raw}`;
                        }
                    }
                }
            }
        }
    });
}

// Cash Balance Chart (Time & Clocking)
function initCashBalanceChart() {
    const ctx = document.getElementById('cash-balance-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['On Time', 'Late', 'Absent'],
            datasets: [{
                data: [70, 20, 10],
                backgroundColor: [
                    '#10B981', // Green
                    '#F59E0B', // Yellow
                    '#EF4444'  // Red
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    }
                }
            }
        }
    });
}

// Balance Chart
function initBalanceChart() {
    const ctx = document.getElementById('balance-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Balance',
                data: [15000, 17500, 16800, 19200, 20500, 21546.55],
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#4F46E5',
                pointRadius: 3,
                pointHoverRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Balance: $' + context.raw.toLocaleString();
                        }
                    }
                }
            }
        }
    });
}

// Wallet Chart
function initWalletChart() {
    const ctx = document.getElementById('wallet-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Burger', 'Chicken', 'Chicken roll'],
            datasets: [{
                data: [35, 40, 25],
                backgroundColor: [
                    '#EF4444', // Red
                    '#3B82F6', // Blue
                    '#F59E0B'  // Yellow
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    }
                }
            }
        }
    });
}

// Earnings Chart
function initEarningsChart() {
    const ctx = document.getElementById('earnings-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'Sales',
                    data: [5200, 6100, 5800, 5700],
                    backgroundColor: 'rgba(59, 130, 246, 0.8)', // Blue
                    borderRadius: 4
                },
                {
                    label: 'Profit',
                    data: [2100, 2500, 2300, 2400],
                    backgroundColor: 'rgba(249, 115, 22, 0.8)', // Orange
                    borderRadius: 4
                },
                {
                    label: 'Surgery',
                    data: [1200, 1400, 1100, 1300],
                    backgroundColor: 'rgba(168, 85, 247, 0.8)', // Purple
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += '$' + context.raw.toLocaleString();
                            return label;
                        }
                    }
                }
            }
        }
    });
}

// Market Overview Chart
function initMarketOverviewChart() {
    const ctx = document.getElementById('market-overview-chart');
    if (!ctx) return;
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Market Value',
                    data: [3500, 3800, 4200, 3900, 4500, 5200, 5100, 5800, 6100, 5900, 6300, 6700],
                    borderColor: '#4F46E5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#4F46E5',
                    pointRadius: 3,
                    pointHoverRadius: 5
                },
                {
                    label: 'Trend Line',
                    data: [3200, 3600, 3900, 4300, 4700, 5000, 5300, 5600, 5900, 6200, 6500, 6800],
                    borderColor: '#10B981',
                    borderDash: [5, 5],
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 0,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += '$' + context.raw.toLocaleString();
                            return label;
                        }
                    }
                }
            }
        }
    });
}