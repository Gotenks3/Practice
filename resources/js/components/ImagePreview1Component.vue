<template>
    <div id="app">
        <input 
            type="file" 
            ref="preview" 
            required 
            name="image1" 
            accept=“image/png,image/jpeg,image/jpg”
            @change="uploadFile">
        <div v-if="url">
            <img :src="url" id="preview">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: ""
        }
    },
    methods: {
        uploadFile() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file)
        }
    }
}
</script>


