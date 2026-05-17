<template>
    <QuillEditor :modules="modules" toolbar="full" />
</template>

<script>
    import { ref, defineComponent } from 'vue'
    import { QuillEditor } from '@vueup/vue-quill'
    import BlotFormatter from 'quill-blot-formatter'
    import '@vueup/vue-quill/dist/vue-quill.snow.css'

    export default defineComponent({
        components: {
            QuillEditor,
        },
        setup: () => {
            const modules = {
                name: 'blotFormatter',
                module: BlotFormatter,
                options: {/* options */}
            }
            return { modules }
        },
    })
</script>