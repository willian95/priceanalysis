@extends('layouts.admin')

@section('content')

    <div>
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Crear Blog</i> </h3>
            </div>

            <div class="row" id="dev-app" style="padding-top:120px;">
                <div class="col-md-6">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" v-model="title">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" ref="file" @change="onImageChange" accept="image/*" style="overflow: hidden;">

                        <img id="blah" :src="imagePreview" class="full-image" style="margin-top: 10px; width: 40%">
                    </div>
                </div>

                <button style="display:none" @click="store()" id="create-click"></button>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea rows="3" id="editor1"></textarea>
                        
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <p class="text-center">
                        <button class="btn btn-success" onclick="create()">Crear</button>
                    </p>
                </div>
            </div>
         
        </div>

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );

        function create(){
            $("#create-click").click()
        }

    </script>

    <script>
                    
        const app = new Vue({
            el: '#dev-app',
            data(){
                return{
                    picture:"",
                    imagePreview:"",
                    action:"create",
                    title:"",
                    description:"",
                    blogs:[],
                    page:1,
                    pages:0
                }
            },
            methods:{

                store(){

                    
                    this.description = CKEDITOR.instances.editor1.getData()

                    if(this.description == ""){

                        swal({
                            text: "Debes agregar una descripción",
                            icon: "error"
                        })

                    }else{

                        this.loading = true
                        axios.post("{{ url('admin/blogs/store') }}", {title:this.title, image: this.picture, description: this.description}).then(res => {
                        this.loading = false
                            if(res.data.success == true){
                                
                                alertify.success(res.data.msg)
                                    
                                window.setTimeout(() => {
                                    window.location.href = "{{ url('/admin/blogs/index') }}";
                                }, 2000);
                                

                            }else{
                                
                                alert(res.data.msg)
                            }

                        }).catch(err => {
                            this.loading = false
                            $.each(err.response.data.errors, function(key, value) {
                                alertify.error(value[0])
                            });
                        })

                    }


                },
                onImageChange(e){
                    this.picture = e.target.files[0];

                    this.imagePreview = URL.createObjectURL(this.picture);
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.view_image = false
                    this.createImage(files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.picture = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
                

            },
            

        })

    </script>

@endpush