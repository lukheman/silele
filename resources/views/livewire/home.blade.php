<div class="space-y-6">
        <!-- Stats cards -->
      <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

          <x-card-stats value="Rp 1000">
              <x-slot:icon>

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" /></svg>
              </x-slot:icon>
              Total Pembelian
          </x-card-stats>

          <x-card-stats variant="success" value="Rp 1000">
              <x-slot:icon>

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
              </x-slot:icon>

              Total Pembelian
          </x-card-stats>

          <x-card-stats variant="danger" value="Rp 1000">
              <x-slot:icon>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0l-8 8-8-8" /></svg>

              </x-slot:icon>

              Total Pembelian
          </x-card-stats>

          <x-card-stats variant="warning" value="Rp 1000">
              <x-slot:icon>

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 10 4-16 3 6h4" /></svg>

              </x-slot:icon>

              Total Pembelian
          </x-card-stats>
      </section>


        <!-- Button Preview -->
        <x-section title="Button Preview">

          <div class="flex flex-wrap gap-4">

            <x-button variant="primary">Primary</x-button>
            <x-button variant="success">Success</x-button>
            <x-button variant="warning">Warning</x-button>
            <x-button variant="danger">Danger</x-button>
            <x-button variant="secondary">Secondary</x-button>
            <x-button variant="ghost">Ghost</x-button>

            <button class="px-4 py-2 rounded-full bg-blue-600 text-white shadow hover:bg-blue-700 transition"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg></button>
          </div>

        </x-section>

        <!-- Form Components Preview -->
        <x-section title="Form Preview">

          <form class="space-y-6">
            <div class="grid gap-6 sm:grid-cols-2">
              <!-- Text Input -->
              <x-input label="halo" placeholder="halo" wire:model="akmal"/>


              <!-- Disabled Input -->
              <x-input label="halo" placeholder="halo" wire:model="akmal" disabled/>

              <!-- Email Input -->

              <x-input label="Email" placeholder="youremail@example.com" wire:model="email" type="email"/>
              <!-- Password Input -->

              <x-input label="Password" placeholder="••••••••" wire:model="password" type="password"/>
              <!-- Select -->
              <x-select label="Select" placeholder="Pilih salah satu">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>

                          </x-select>
              <!-- Textarea -->
              <x-textarea label="Textarea" placeholder="Tulis pesanmu">
                          </x-textarea>
            </div>

            <!-- Radio Group -->

            <x-input-group label="Radio Group">
                <x-radio label="Option 1" checked/>
                <x-radio label="Option 2" />
            </x-input-group>
            <!-- Checkbox Group -->
            <x-input-group label="Checkbox Group">
            <x-checkbox label="Checkbox 1" checked/>
            <x-checkbox label="Checkbox 2" />
          </x-input-group>
            <!-- Error Input -->
          <!-- TODO: Implement error to input component -->
            <div>
              <label class="block mb-1 text-sm font-medium text-red-600" for="input-error">Input with Error</label>
              <input id="input-error" type="text" class="w-full px-3 py-2 bg-red-50 border border-red-400 rounded-md focus:ring-red-500 focus:border-red-500 text-red-700 placeholder-red-400" placeholder="Error value" />
              <p class="mt-1 text-xs text-red-600">This field is required.</p>
            </div>
          </form>
      </x-section>

        <!-- Progress Bar Preview -->
        <x-section title="Progress Bar Preview">

            <div class="space-y-6">
             <x-progress-bar variant="primary" label="Primary Progress (70%)" value="20%" />
             <x-progress-bar variant="success" label="Primary Progress (70%)" value="40%" />
             <x-progress-bar variant="warning" label="Primary Progress (70%)" value="60%" />
             <x-progress-bar variant="danger" label="Primary Progress (70%)" value="80%" />
              </div>
        </x-section>

        <!-- Alert Preview -->
        <x-section title="Alert Preview">
            <div class="space-y-4">
                  <x-alert variant="primary" label="Info :">

                  <x-slot:icon>
                      <svg class="w-5 h-5 mt-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
                  </x-slot:icon>
                  This an alert info</x-alert>

                  <x-alert variant="success" label="Success :">

                  <x-slot:icon>
              <svg class="w-5 h-5 mt-1 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                  </x-slot:icon>
                  This an alert success</x-alert>

                  <x-alert variant="warning" label="Warning :">

                  <x-slot:icon>
              <svg class="w-5 h-5 mt-1 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
                  </x-slot:icon>
                  This an alert info</x-alert>

                  <x-alert variant="danger" label="Danger :">

                  <x-slot:icon>
              <svg class="w-5 h-5 mt-1 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                  </x-slot:icon>
                  This an alert info</x-alert>
              </div>
              </x-section>

        <!-- Table Preview -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100" x-data="{
            openAddModal: false,
            search: '',
            users: [
              { name: 'John Doe', email: 'john@example.com', role: 'Admin' },
              { name: 'Jane Smith', email: 'jane@example.com', role: 'Editor' },
            ]
          }">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
            <h2 class="text-lg font-semibold">Table Preview</h2>
            <div class="flex items-center gap-2 w-full sm:w-auto">
              <input x-model="search" type="text" placeholder="Search..." class="px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm w-32" />
              <button @click="openAddModal = true" type="button" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Data
              </button>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                  <th class="px-6 py-3 text-left">Name</th>
                  <th class="px-6 py-3 text-left">Email</th>
                  <th class="px-6 py-3 text-left">Role</th>
                  <th class="px-6 py-3 text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 [&>tr:nth-child(even)]:bg-gray-50">
                <template x-for="user in users.filter(u => (u.name + u.email + u.role).toLowerCase().includes(search.toLowerCase()))" :key="user.email">
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium" x-text="user.name"></td>
                    <td class="px-6 py-4" x-text="user.email"></td>
                    <td class="px-6 py-4" x-text="user.role"></td>
                    <td class="px-6 py-4 text-right space-x-2">
                      <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-blue-50 text-blue-700 hover:bg-blue-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z'/></svg>View</button>
                      <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'/></svg>Update</button>
                      <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-rose-50 text-rose-700 hover:bg-rose-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'/></svg>Delete</button>
                    </td>
                  </tr>
                </template>
                <tr x-show="users.filter(u => (u.name + u.email + u.role).toLowerCase().includes(search.toLowerCase())).length === 0">
                  <td colspan="4" class="px-6 py-4 text-center text-gray-400">No data found.</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Modal Add Data -->
          <div x-init="$watch('openAddModal', val => { if(val) document.body.classList.add('overflow-hidden'); else document.body.classList.remove('overflow-hidden') })">
            <template x-if="openAddModal">
              <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
                <div x-show="openAddModal" x-transition class="bg-white w-full max-w-md p-6 rounded-md shadow-lg">
                  <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Tambah Data</h3>
                    <button @click="openAddModal=false" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                  </div>
                  <form class="space-y-4">
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="name">Name</label>
                      <input id="name" type="text" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Full Name" />
                    </div>
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="email">Email</label>
                      <input id="email" type="email" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Email" />
                    </div>
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="role">Role</label>
                      <select id="role" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option>Admin</option>
                        <option>Editor</option>
                        <option>Viewer</option>
                      </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                      <button type="button" @click="openAddModal=false" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">Cancel</button>
                      <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </template>
          </div>
        </section>

        <!-- Charts -->
        <section class="grid gap-6 lg:grid-cols-2">
          <div class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
            <h2 class="mb-4 text-lg font-semibold">Sales Overview</h2>
            <canvas id="sales-chart" class="w-full h-64"></canvas>
          </div>
          <div class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
            <h2 class="mb-4 text-lg font-semibold">User Acquisition</h2>
            <canvas id="users-chart" class="w-full h-64"></canvas>
          </div>
        </section>

        <!-- Recent Activity -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
          <h2 class="mb-4 text-lg font-semibold">Recent Activity</h2>
          <ul class="space-y-4">
            <li class="flex items-start gap-4">
              <span class="inline-flex items-center justify-center w-10 h-10 text-white bg-primary rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
              </span>
              <p class="flex-1">You have <span class="font-medium text-gray-700">5 new notifications</span>.</p>
              <span class="text-sm text-gray-400">2h ago</span>
            </li>
            <li class="flex items-start gap-4">
              <span class="inline-flex items-center justify-center w-10 h-10 text-white bg-accent rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
              </span>
              <p class="flex-1">New user <span class="font-medium text-gray-700">Jane Doe</span> registered.</p>
              <span class="text-sm text-gray-400">4h ago</span>
            </li>
          </ul>
        </section>

</div>

  <!-- Charts Example JS -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const salesCtx = document.getElementById('sales-chart');
      const usersCtx = document.getElementById('users-chart');

      if (salesCtx) {
        new Chart(salesCtx, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
              label: 'Sales',
              data: [12000, 15000, 10000, 18000, 22000, 19000],
              backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444', '#ec4899', '#0ea5e9'],
              hoverBackgroundColor: ['#4f46e5', '#059669', '#d97706', '#dc2626', '#db2777', '#0369a1'],
              borderRadius: 4,
            }]
          },
          options: {
            responsive: true,
            plugins: { legend: { display: false } }
          }
        });
      }

      if (usersCtx) {
        new Chart(usersCtx, {
          type: 'pie',
          data: {
            labels: ['Organic', 'Referral', 'Social', 'Ads'],
            datasets: [{
              data: [45, 25, 20, 10],
              backgroundColor: ['#10b981', '#6366f1', '#f59e0b', '#ef4444'],
            }]
          },
          options: { responsive: true }
        });
      }
    });
  </script>
