<template>
    <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <transition enter-active-class="transform ease-out duration-300 transition" enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" enter-to-class="translate-y-0 opacity-100 sm:translate-x-0" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="show" class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-green-500 shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <CheckCircleIcon class="h-6 w-6 text-white" aria-hidden="true" />
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-white">Sikeres mentés!</p>
                            <p class="mt-1 text-sm text-gray-100">A(z) {{ message }} sikeresen el lett mentve.</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" @click="show = false" class="inline-flex rounded-md bg-green-500 text-white hover:text-gray-200 focus:outline-none focus:ring-0">
                                <XMarkIcon class="h-5 w-5" aria-hidden="true" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </transition>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue'
    import { CheckCircleIcon } from '@heroicons/vue/24/outline'
    import { XMarkIcon } from '@heroicons/vue/20/solid'
    const props = defineProps(['message'])
    onMounted(() => {
        setTimeout(function () {
            show.value = false;
        }, 5000);
    })
    const show = ref(true)
</script>
