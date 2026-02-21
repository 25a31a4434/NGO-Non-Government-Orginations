<?php
header("Content-type: text/css");
?>
/* Global Styles */
:root {
    --primary: #2c3e50;
    --secondary: #34495e;
    --accent: #e74c3c;
    --success: #27ae60;
    --warning: #f39c12;
    --danger: #e74c3c;
    --light: #ecf0f1;
    --dark: #2c3e50;
    --text: #333;
    --text-light: #666;
    --white: #fff;
    --shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Typography */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--text);
}

h1, h2, h3, h4, h5, h6 {
    margin-bottom: 1rem;
    color: var(--dark);
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 0.8rem 1.8rem;
    background: var(--primary);
    color: var(--white);
    text-decoration: none;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 1rem;
}

.btn:hover {
    background: var(--secondary);
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}

.btn-primary {
    background: var(--primary);
}

.btn-accent {
    background: var(--accent);
}

.btn-success {
    background: var(--success);
}

.btn-block {
    display: block;
    width: 100%;
}

/* Cards */
.card {
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.card-header {
    padding: 1.5rem;
    background: var(--primary);
    color: var(--white);
}

.card-body {
    padding: 1.5rem;
}

.card-footer {
    padding: 1rem 1.5rem;
    background: var(--light);
    border-top: 1px solid #ddd;
}

/* Forms */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--dark);
}

.form-control {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e0e0e0;
    border-radius: 5px;
    font-size: 1rem;
    transition: all 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(44,62,80,0.1);
}

.form-select {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e0e0e0;
    border-radius: 5px;
    background: var(--white);
    cursor: pointer;
}

.form-textarea {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e0e0e0;
    border-radius: 5px;
    min-height: 120px;
    resize: vertical;
}

/* Alerts */
.alert {
    padding: 1rem 1.5rem;
    border-radius: 5px;
    margin-bottom: 1.5rem;
    border-left: 5px solid transparent;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left-color: var(--success);
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border-left-color: var(--danger);
}

.alert-warning {
    background: #fff3cd;
    color: #856404;
    border-left-color: var(--warning);
}

.alert-info {
    background: #d1ecf1;
    color: #0c5460;
    border-left-color: #17a2b8;
}

/* Grid System */
.row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.grid-2 {
    grid-template-columns: repeat(2, 1fr);
}

.grid-3 {
    grid-template-columns: repeat(3, 1fr);
}

.grid-4 {
    grid-template-columns: repeat(4, 1fr);
}

/* Tables */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem 0;
}

.table th,
.table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background: var(--primary);
    color: var(--white);
}

.table tr:hover {
    background: var(--light);
}

/* Badges */
.badge {
    display: inline-block;
    padding: 0.3rem 0.6rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
}

.badge-primary {
    background: var(--primary);
    color: var(--white);
}

.badge-success {
    background: var(--success);
    color: var(--white);
}

.badge-warning {
    background: var(--warning);
    color: var(--white);
}

.badge-danger {
    background: var(--danger);
    color: var(--white);
}

/* Loading Spinner */
.spinner {
    border: 4px solid var(--light);
    border-top: 4px solid var(--primary);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 2rem auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1100;
}

.modal-content {
    background: var(--white);
    width: 90%;
    max-width: 600px;
    margin: 50px auto;
    padding: 2rem;
    border-radius: 10px;
    animation: slideDown 0.3s;
}

@keyframes slideDown {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    gap: 0.5rem;
    margin: 2rem 0;
}

.pagination li a,
.pagination li span {
    display: block;
    padding: 0.5rem 1rem;
    background: var(--white);
    border: 1px solid #ddd;
    color: var(--text);
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s;
}

.pagination li.active span {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}

.pagination li a:hover {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}

/* Responsive */
@media (max-width: 768px) {
    .grid-2,
    .grid-3,
    .grid-4 {
        grid-template-columns: 1fr;
    }
    
    .modal-content {
        width: 95%;
        margin: 20px auto;
        padding: 1rem;
    }
}