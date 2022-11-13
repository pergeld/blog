<div class="relative">
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-sky-300 via-sky-300/70 to-blue-300 opacity-10 blur-lg"></div>
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-sky-300 via-sky-300/70 to-blue-300 opacity-10"></div>
    <div class="relative rounded-2xl bg-[#0A101F]/80 ring-1 ring-white/10 backdrop-blur">
        <div class="absolute -top-px left-20 right-11 h-px bg-gradient-to-r from-sky-300/0 via-sky-300/70 to-sky-300/0"></div>
        <div class="absolute -bottom-px left-11 right-20 h-px bg-gradient-to-r from-blue-400/0 via-blue-400 to-blue-400/0"></div>
        <div class="pl-4 pt-4 pb-6">
            <div class="mt-4 flex space-x-2 text-xs">
                <div class="flex h-6 rounded-full bg-gradient-to-r from-sky-400/30 via-sky-400 to-sky-400/30 p-px font-medium text-sky-300">
                    <div class="flex items-center rounded-full px-2.5 bg-slate-800">Laravel</div>
                </div>
                <div class="flex h-6 rounded-full text-gray-500">
                    <div class="flex items-center rounded-full px-2.5">routes/web.php</div>
                </div>
            </div>

            <div class="mt-6 flex items-start px-1 text-sm">
                <div class="select-none border-r border-gray-300/5 pr-4 font-mono text-gray-600">
                    01 <br> 02 <br> 03 <br> 04 <br> 05 <br> 06 <br> 07 <br>
                </div>

                <div class="prism-code language-javascript flex overflow-x-auto">
                    <code class="px-4">
                        <div>
                            <span class="text-green-300">Route</span>
                            <span class="text-white">::</span>
                            <span class="text-yellow-100">post(</span>
                            <span class="text-red-200">'/users'</span>
                            <span class="text-white">, </span>
                            <span class="text-blue-400">function </span>
                            <span class="text-gray-300">(</span>
                            <span class="text-green-300">UserRequest </span>
                            <span class="text-gray-200">$request</span>
                            <span class="text-gray-300">) {</span>
                        </div>


                        <div class="pl-4">
                            <span class="text-gray-200">$user = </span>
                            <span class="text-green-300">User</span>
                            <span class="text-white">::</span>
                            <span class="text-yellow-100">create</span>
                            <span class="text-blue-200">(</span>
                            <span class="text-gray-200">$request-></span>
                            <span class="text-yellow-100">validated()</span>
                            <span class="text-blue-200">)</span>
                            <span class="text-white">;</span>
                        </div>

                        <br>

                        <div class="pl-4">
                            <span class="text-green-300">Mail</span>
                            <span class="text-white">::</span>
                            <span class="text-yellow-100">to</span>
                            <span class="text-blue-200">(</span>
                            <span class="text-gray-200">$user->email</span>
                            <span class="text-blue-200">)</span>
                            <span class="text-gray-200">-></span>
                            <span class="text-yellow-100">send</span>
                            <span class="text-blue-200">(</span>
                            <span class="text-blue-400">new </span>
                            <span class="text-green-300">WelcomeMessage</span>
                            <span class="text-blue-200">)</span>
                            <span class="text-white">;</span>
                        </div>

                        <br>

                        <div class="pl-4">
                            <span class="text-gray-300">return </span>
                            <span class="text-white">$user;</span>
                        </div>

                        <div>
                            <span class="text-gray-300">}</span>
                            <span class="text-yellow-100">)</span>
                            <span class="text-white">;</span>
                        </div>
                    </code>
                </div>
            </div>
        </div>
    </div>
</div>
