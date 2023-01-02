<div class="py-12 px-10 w-1/4">
    <div class="flex space-2 items-center border-b-2 pb-4">
        <div>
            <svg width="200" height="200" viewBox="-100 -100 200 200" class="h-14 w-14 text-indigo-600">
                <polygon points="0,0 80,120 -80,120" fill="#234236" />
                <polygon points="0,-40 60,60 -60,60" fill="#0C5C4C" />
                <polygon points="0,-80 40,0 -40,0" fill="#38755B" />
                <rect x="-20" y="120" width="40" height="30" fill="brown" />
            </svg>
        </div>
        <div class="ml-3">
            <h1 class="text-3xl font-bold text-indigo-600">@yield("title")
            </h1>
            <p class="text-center text-sm text-indigo-600 mt-1 font-serif">DASHBOARD</p>
        </div>
    </div>
    <div class="flex items-center space-x-4 mt-6 p-2 bg-indigo-600 rounded-md">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
            </svg>
        </div>
        <div>
            <p class="text-lg text-white font-semibold">Dashboard</p>
        </div>
    </div>
    <div class="mt-8">
        <ul class="space-y-10">
            <li>
                <a href="MainDashboard"
                    class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200"
                    hover:text-indigo-600>
                    <img src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/58/000000/external-student-female-profession-vitaliy-gorbachev-flat-vitaly-gorbachev-1.png"
                        class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
                    Students</a>
            </li>
            <li>
                <a href="teachers"
                    class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200"
                    hover:text-indigo-600>
                    <img src="https://img.icons8.com/external-icongeek26-flat-icongeek26/64/000000/external-teacher-education-icongeek26-flat-icongeek26.png"
                        class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
                    Teachers</a>
            </li>
            <li>
                <a href="subject"
                    class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200"
                    hover:text-indigo-600>
                    <img src="https://img.icons8.com/fluency/48/000000/books.png"
                        class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
                    Subjects</a>
            </li>
            <li>
                <a href="class"
                    class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200"
                    hover:text-indigo-600>
                    <img src="https://img.icons8.com/external-flat-02-chattapat-/64/000000/external-class-back-to-school-flat-02-chattapat-.png"
                        class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
                    Class</a>
            </li>
            <li>
                <a href="settings"
                    class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200"
                    hover:text-indigo-600>
                    <img src="https://img.icons8.com/color/48/000000/settings.png"
                        class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
                    Settings</a>
            </li>
        </ul>
    </div>
    <div class="flex mt-20 space-x-4 items-center">
        <div>
            <img src="https://img.icons8.com/external-kmg-design-flat-kmg-design/32/000000/external-log-out-user-interface-kmg-design-flat-kmg-design.png"
                class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200" />
        </div>
        <form id="form-logout-user" style="display: none" action="{{ route('logoutuser') }}" method="post">
            @csrf
        </form>

        <a href="{{route('logoutuser')}}"
            onclick="event.preventDefault(); document.getElementById('form-logout-user').submit();"
            class="block font-semibold text-gray-500 hover:text-indigo-600 transition duration-200">
            Logout
        </a>
    </div>

</div>