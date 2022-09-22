<template>
    <div>
        <form
            enctype="multipart/form-data"
            class="space-y-12"
            @submit.prevent="onSubmit"
            id="articleForm"
        >
            <input type="hidden" name="_token" :value="csrf">

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A hír adatai. A cím és a bevezető megadása kötelező.</p>
                    </div>
                    <div class="mt-5 space-y-6 lg:col-span-2 lg:mt-0">

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Cím</label>
                            <input type="text" name="title" id="title" v-model="formData.title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="lead" class="block text-sm font-medium text-gray-700">Bevezető</label>
                            <div class="mt-1">
                                <textarea id="lead" name="lead" v-model="formData.lead" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Rövid bevezető szöveg, ami a hírek lista oldalon is meg fog jelenni.</p>
                        </div>


                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Megjelenési adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A hír akkor lesz megtekinthető a beállított megjelenési idő után, ha a láthatóság is be van kapcsolva.</p>
                    </div>
                    <div class="mt-5 space-y-6 lg:col-span-2 lg:mt-0">

                        <div class="text-base font-medium text-gray-900" aria-hidden="true">Láthatóság</div>

                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_visible" name="is_visible" v-model="formData.is_visible" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none focus:ring-0">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_visible" class="font-medium text-gray-700">Látható az oldalon?</label>
                                <p class="text-gray-500">Jelöld be az alábbi checkboxot ahhoz, hogy a hír látható legyen az oldalon.</p>
                            </div>
                        </div>



                        <div>
                            <label for="published_date" class="block text-sm font-medium text-gray-700 mb-2">Megjelenés dátuma</label>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <input
                                        type="date"
                                        name="published_date"
                                        id="published_date"
                                        v-model="formData.published_date"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <input
                                        type="time"
                                        name="published_time"
                                        id="published_time"
                                        v-model="formData.published_time"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="expires_date" class="block text-sm font-medium text-gray-700 mb-2">Megjelenés vége</label>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <input
                                        type="date"
                                        name="expires_date"
                                        id="expires_date"
                                        v-model="formData.expires_date"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <input
                                        type="time"
                                        name="expires_time"
                                        id="expires_time"
                                        v-model="formData.expires_time"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a :href="backLink" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import dayjs from 'dayjs';

export default {
    props: [
        'csrf',
        'backLink',
    ],

    data() {
        return {
            form: null,
            formData: {
                title: '',
                lead: '',
                is_visible: true,
                published_date: dayjs().format('YYYY-MM-DD'),
                published_time: dayjs().format('00:00'),
                expires_date: dayjs().add(1, 'y').format('YYYY-MM-DD'),
                expires_time: dayjs().format('23:59'),
            }
        }
    },

    methods: {
        onSubmit() {
            axios.post(
                '/admin/articles/store',
                this.formData
            )
                .then((response) => {
                    window.location = response.data.redirect;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        }
    }
}
</script>
