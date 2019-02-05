<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            editmode: false,
            als: {},
            form: new Form({
                id: '',
                description: ''
            }),
        }
    },
    methods: {  
        load_all(){
            this.get_access_levels();
        },
        get_access_levels()
        {
            
        },
        get_all_access_levels()
        {
            
        },
        create_access_level()
        {

        },
        store_access_level()
        {

        },
        edit_access_level()
        {
            
        },
        update_access_level()
        {

        },
        delete_access_level()
        {

        }

    },
    created(){
        this.load_all();

    },
}
</script>