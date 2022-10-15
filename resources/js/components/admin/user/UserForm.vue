<template>
    <div>
        <Form
            enctype="multipart/form-data"
            class="space-y-12"
            @submit="onSubmit"
            id="userForm"
        >
            <input type="hidden" name="_token" :value="csrf">

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A felhasználó adatai. A név és az e-mail megadása kötelező.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
                            <Field
                                type="text"
                                name="name"
                                id="name"
                                maxlength="100"
                                v-model="formData.name"
                                :rules="validateRequired"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            <ErrorMessage name="name" class="mt-2 text-sm text-red-700" />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail cím</label>
                            <div class="mt-1">
                                <Field
                                    type="email"
                                    id="email"
                                    name="email"
                                    v-model="formData.email"
                                    :rules="validateRequired"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                                <ErrorMessage name="email" class="mt-2 text-sm text-red-700" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Vendég blogger?</h3>
                        <p class="mt-1 text-sm text-gray-500">A vendég blogger csak új hírt tud létrehozni.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_guest_writer" name="is_guest_writer" v-model="formData.is_guest_writer" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none focus:ring-0">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_guest_writer" class="font-medium text-gray-700">Vendég blogger?</label>
                                <p class="text-gray-500">Jelöld be az alábbi checkboxot ahhoz, hogy a felhasználó vendég blogger legyen.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a :href="backLink" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </Form>
    </div>
</template>

<script>
import axios from 'axios';
import { Form, Field, ErrorMessage } from 'vee-validate';

export default {
    props: [
        'csrf',
        'backLink',
        'submitUrl',
    ],

    components: {
        Form,
        Field,
        ErrorMessage,
    },

    data() {
        return {
            form: null,
            formData: {
                name: '',
                email: '',
                is_guest_writer: false,
            }
        }
    },

    methods: {
        onSubmit(values) {
            axios.post(
                this.submitUrl,
                this.formData
            )
                .then((response) => {
                    window.location = response.data.redirect;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },

        validateRequired(value) {
            if (!value) {
                return 'A mező kitöltése kötelező!';
            }

            return true;
        }
    }
}
</script>
