<template>
<body class="h-screen overflow-hidden bg-gray-100">
  <header class="flex justify-between items-center py-4 px-6 bg-white shadow-md">
    <div class="flex items-center">
      <img src="https://placehold.co/40x40" alt="Phone Shop Logo" class="mr-4">
      <h1 class="text-2xl font-bold">Phone Shop POS System</h1>
    </div>
    <nav class="flex items-center">
      <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out mr-4">
        <i class="fas fa-home"></i>
      </a>
      <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out mr-4">
        <i class="fas fa-cog"></i>
      </a>
      <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </nav>
  </header>
  <main class="flex h-screen overflow-hidden">
    <aside class="w-64 bg-white shadow-md overflow-y-auto">
      <ul class="divide-y divide-gray-200">
        <li class="py-4 px-6">
          <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
            <i class="fas fa-phone mr-2"></i>
            Sales
          </a>
        </li>
        <li class="py-4 px-6">
          <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
            <i class="fas fa-box mr-2"></i>
            Inventory
          </a>
        </li>
        <li class="py-4 px-6">
          <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
            <i class="fas fa-chart-bar mr-2"></i>
            Reports
          </a>
        </li>
        <li class="py-4 px-6">
          <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
            <i class="fas fa-cog mr-2"></i>
            Settings
          </a>
        </li>
      </ul>
    </aside>
    <div class="flex-1 overflow-y-auto">
      <section class="p-6">
        <h2 class="text-2xl font-bold mb-4">Sales Dashboard</h2>
        <div class="flex justify-between mb-4">
          <div class="bg-white shadow-md p-4 w-1/2 mr-4">
            <h3 class="text-lg font-bold mb-2">Today's Sales</h3>
            <p class="text-2xl font-bold">$10,000</p>
          </div>
          <div class="bg-white shadow-md p-4 w-1/2">
            <h3 class="text-lg font-bold mb-2">Today's Profit</h3>
            <p class="text-2xl font-bold">$2,000</p>
          </div>
        </div>
        <div class="bg-white shadow-md p-4">
          <h3 class="text-lg font-bold mb-2">Recent Transactions</h3>
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left">Date</th>
                <th class="text-left">Customer</th>
                <th class="text-left">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2023-02-20 14:30</td>
                <td>John Doe</td>
                <td>$500</td>
              </tr>
              <tr>
                <td>2023-02-20 14:20</td>
                <td>Jane Doe</td>
                <td>$200</td>
              </tr>
              <tr>
                <td>2023-02-20 14:10</td>
                <td>Bob Smith</td>
                <td>$300</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </main>
</body>
</template>