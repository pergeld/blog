<template>
    <div ref="editor"
        class="block w-full rounded-b-md border-gray-300 shadow-sm"
    ></div>
</template>

<script>
import Quill from 'quill';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';

export default {
    props: {
        value: {
            type: String,
            default: ''
        }
    },

    data() {
        return {
            editor: null
        };
    },

    mounted() {
        var _this = this;

        var toolbarOptions = [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],

            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],

            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']
        ];

        this.editor = new Quill(this.$refs.editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });

        this.editor.root.innerHTML = this.value;
        this.editor.on('text-change', function () {
            return _this.update();
        });
    },

    methods: {
        update: function update() {
            this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
        }
    },
}
</script>
