<div
    class="fixed top-0 z-20 w-screen h-16 z-10 p-2 border-b border-gray-200 dark:border-slate-700 bg-white dark:text-gray-100 dark:bg-slate-800"
>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <div>
                <img
                    src="https://img.freepik.com/free-icon/user_318-159711.jpg"
                    alt="profile"
                    class="w-12 h-12 ring-2 rounded-full ring-offset-1 cursor-pointer"
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="profile_menu"
                />
                <div
                    id="profile_menu"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                >
                    <ul
                        class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton"
                    >
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >Settings</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >Sign out</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <button
                    class="p-3 hover:bg-gray-200 dark:hover:bg-slate-700 dark:text-gray-100 rounded-lg"
                >
                    <svg
                        x-show="!isDark"
                        @click="isDark=true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                        />
                    </svg>
                    <svg
                        x-show="isDark"
                        @click="isDark=false"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center space-x-1 lg:space-x-0">
            <div>
                <h1>logo</h1>
            </div>
            <div
                class="lg:hidden"
                @click="isOpenMenu = isOpenMenu ? false : true"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25"
                    />
                </svg>
            </div>
        </div>
    </div>
</div>
