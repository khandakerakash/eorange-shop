<template>
    <div class="col-md-12">
        <div class="col-md-2">
            <img :src="image" class="img-responsive">
        </div>
        <div class="col-md-8">
            <input type="file" @change="onFileChange" class="form-control">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success btn-block" @click.prevent="upload">Upload</button>
        </div>
    </div>
</template>

<script>
    export default{
        mounted() {
            console.log('Component file upload mounted.');
        },
        data(){
            return {
                image: '',
                imageName: ''
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                this.imageName = files[0]['name'];
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                    vm.upload();
                };
                reader.readAsDataURL(file);
            },
            upload(){
                let vm = this;
                axios.post('/blog/image',{
                    image: this.image,
                    imageName: this.imageName
                })
                    .then(response => {
                        Event.$emit('fileUploaded',{
                            filename: response.data.filename,
                        });
                    })
                    .catch(function (error) {
                        Vue.swal({
                            title: 'File Upload Failure!',
                            text: "File size should be less than 2Mb",
                            type: 'warning',
                            confirmButtonText: "Okay gotcha!"
                        });
                    });
            }
        }
    }
</script>