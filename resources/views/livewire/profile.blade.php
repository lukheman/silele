<div>
    <x-section title="Profile">

    <div class="flex flex-col items-center gap-4 mb-6">
        <img src="https://i.pravatar.cc/100?img=5" alt="avatar" class="w-24 h-24 rounded-full border-4 border-blue-100 shadow" />
        <div class="text-center">
            <div class="text-xl font-semibold text-gray-700">John Doe</div>
            <div class="text-gray-500 text-sm">john@example.com</div>
        </div>
    </div>
    <form class="space-y-4">
        <div>
            <label class="block mb-1 text-sm font-medium" for="profile-name">Name</label>
            <input id="profile-name" type="text" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="John Doe" />
        </div>
        <div>
            <label class="block mb-1 text-sm font-medium" for="profile-email">Email</label>
            <input id="profile-email" type="email" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="john@example.com" />
        </div>
        <div>
            <label class="block mb-1 text-sm font-medium" for="profile-password">Password</label>
            <input id="profile-password" type="password" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="New password" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
    </x-section>

</div>
