<template>
    <div>
        <Form
            enctype="multipart/form-data"
            class="space-y-12"
            @submit="onSubmit"
            id="articleCategoryForm"
        >
            <input type="hidden" name="_token" :value="csrf">

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A kategória adatai. A megnevezés megadása kötelező.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Megnevezés</label>
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

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Megjelenési adatok</h3>
                        <p class="mt-1 text-sm text-gray-500">A hír kategória akkor lesz megtekinthető, ha a láthatóság be van kapcsolva.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div class="text-base font-medium text-gray-900" aria-hidden="true">Láthatóság</div>

                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_visible" name="is_visible" v-model="formData.is_visible" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none focus:ring-0">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_visible" class="font-medium text-gray-700">Látható az oldalon?</label>
                                <p class="text-gray-500">Jelöld be az alábbi checkboxot ahhoz, hogy a hír kategória látható legyen az oldalon.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Kiemelés</h3>
                        <p class="mt-1 text-sm text-gray-500">A kiemelt hír kategóriák jelennek meg a nyitóoldalon..</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <div class="text-base font-medium text-gray-900" aria-hidden="true">Kiemelés</div>

                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="is_highlighted" name="isis_highlighted_visible" v-model="formData.is_highlighted" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none focus:ring-0">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_highlighted" class="font-medium text-gray-700">Kiemelt?</label>
                                <p class="text-gray-500">Jelöld be az alábbi checkboxot ahhoz, hogy a hír kategória kiemelt legyen, és megjelenjen a nyitóoldalon.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                    <div class="xl:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Ikon</h3>
                        <p class="mt-1 text-sm text-gray-500">A hír kategória ikonja. Megadása nem kötelező, de ajánlott.</p>
                        <p class="mt-1 text-sm text-gray-500">Az ikon minimum mérete: <strong>40x40</strong> px.</p>
                        <p class="mt-1 text-sm text-gray-500">Feltölthető fájlformátumok: <strong>jpg, png</strong>.</p>
                        <p class="mt-1 text-sm text-gray-500">Maximum 1 darab kép tölthető fel.</p>
                        <p class="mt-1 text-sm text-gray-500">A fájl mérete maximum: <strong>2 MB</strong>.</p>
                    </div>
                    <div class="mt-5 space-y-6 xl:col-span-2 xl:mt-0">

                        <file-pond
                            name="imageUpload"
                            ref="pond"
                            label-idle="Képek feltöltéséhez kattints ide, vagy húzd ide a képeket."
                            accepted-file-types="image/jpg, image/jpeg, image/png"
                            label-file-type-not-allowed="Nem megfelelő fájlformátum"
                            file-validate-type-label-expected-types="A feltölthető fájlformátumok: {allButLastType} vagy {lastType}"
                            :server="server"
                            max-file-size="2MB"
                            label-max-file-size-exceeded="A fájl túl nagy méretű"
                            label-max-file-size="A maximum fájl méret: {filesize}"
                            image-validate-size-min-width="40"
                            image-validate-size-min-height="40"
                            image-validate-size-label-image-size-too-small="A kép mérete nem megfelelő"
                            image-validate-size-label-expected-min-size="A kép minimum mérete {minWidth} x {minHeight} px"
                            @removefile="removeFile"
                        />

                        <div v-if="formData.imageUpload" class="relative">
                            <img :src="'/storage/' + formData.imageUpload" alt="" class="w-72">

                            <button
                                type="button"
                                @click="deletePicture"
                                class="absolute bottom-2 left-2 inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-0"
                            >
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a :href="backLink" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0">Mégsem</a>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-gray-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-0">Mentés</button>
            </div>
        </Form>
    </div>
</template>

<script>
import axios from 'axios';
import { Form, Field, ErrorMessage } from 'vee-validate';
import vueFilePond from 'vue-filepond';
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginFileValidateSize, FilePondPluginImageValidateSize);

export default {
    props: [
        'csrf',
        'backLink',
        'articleCategory',
        'submitUrl',
    ],

    components: {
        Form,
        Field,
        ErrorMessage,
        FilePond,
    },

    data() {
        return {
            form: null,
            formData: {
                title: this.articleCategory.title,
                is_visible: this.articleCategory.is_visible ? true : false,
                is_highlighted: this.articleCategory.is_highlighted ? true : false,
                imageUpload: this.articleCategory.image_upload,
                change_picture: false,
            },
            server: {
                process: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
                    },
                    onload: (response) => {
                        this.formData.imageUpload = response;
                        this.formData.change_picture = true;
                    },
                }
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
        },

        deletePicture() {
            this.formData.imageUpload = null;
            this.formData.change_picture = true;
        },

        removeFile() {
            this.formData.imageUpload = null;
        }
    }
}
</script>
