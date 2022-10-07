<template>
    <div>
        <Form
            enctype="multipart/form-data"
            class="space-y-12"
            @submit="onSubmit"
            id="pageContentForm"
        >
            <input type="hidden" name="_token" :value="csrf">

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A tartalom adatai. A cím megadása kötelező.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Cím</label>
                            <Field
                                type="text"
                                name="title"
                                id="title"
                                maxlength="100"
                                v-model="formData.title"
                                :rules="validateRequired"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            <ErrorMessage name="title" class="mt-2 text-sm text-red-700" />
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Leírás</label>
                            <div class="mt-1">
                                <quill-editor
                                    @input="formData.content = $event"
                                    :content-text="formData.content"
                                ></quill-editor>
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
import QuillEditor from '../editor/QuillEditor.vue';

export default {
    props: [
        'csrf',
        'backLink',
        'pageContent',
        'submitUrl',
    ],

    components: {
        Form,
        Field,
        ErrorMessage,
        QuillEditor,
    },

    data() {
        return {
            form: null,
            formData: {
                title: this.pageContent.title,
                content: this.pageContent.content,
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
