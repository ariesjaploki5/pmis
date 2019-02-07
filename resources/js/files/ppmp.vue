<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h3>PPMP</h3>
            </div>
            <a class="btn btn-sm btn-primary" href="">return</a>
        </div>
        <div class="row mt-2 mb-2">
            <div class="col-md-12">
                <form action="">
                    <div class="form-row">
                        <div class="col-8">
                            <input v-model="search" class="form-control">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-info btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-12">
                <form  @submit.prevent="store_ppmp()" class="text-left">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th width="8%">Code</th>
                                <th>Item</th>
                                <th width="10%">Unit of Issue</th>
                                <th width="6%">Quantity</th>
                                <th width="15%">Unit Cost</th>
                                <th width="15%">Estimated <br>Budget</th>
                                <th width="12%">Mode of Procurement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in rows" :key="row.id">
                                <td>
                                    <input v-model="row.code" type="text" class="form-control form-control-sm">
                                </td>
                                <td>
                                    <input v-model="row.item" type="text" class="form-control form-control-sm">
                                </td>
                                <td>
                                    <select v-model="row.unit" type="text" class="form-control form-control-sm">
                                        <option></option>
                                        <option v-for="unit in units" :key="unit.id" :value="unit.id">{{ unit.description }}</option>
                                    </select>
                                </td>
                                <td>
                                    <input v-model="row.quantity" type="number" min="1" class="form-control form-control-sm text-right" placeholder="0">
                                </td>
                                <td>
                                    <input v-model="row.cost" type="number" min="0.0001" max="999,999,999.9999" step="0.0001" class="form-control form-control-sm text-right" placeholder="ex:......9999.9999">
                                </td>
                                
                                <td>
                                    <input type="text" class="form-control form-control-sm text-right" number readonly v-model="row.estimated_cost = row.cost * row.quantity">
                                </td>
                                <td>
                                    <select v-model="row.mop" type="text" class="form-control form-control-sm">
                                        <option></option>
                                        <option v-for="mop in mops" :key="mop.id" :value="mop.id">{{ mop.description }}</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="button" class="btn btn-primary btn-sm" @click="add_row()">Add</button>
                                </td>
                                <td class="text-right">Total Cost:</td>
                                <td>{{ total_cost }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success text-white btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            mops: {},
            units: {},
            rows: [
                { code: '', item: '', unit: '', quantity: '', cost: '', mop: '', estimated_cost: ''},
                ],
            total_cost: '',
            search: '',
            form: new Form({

            })
        }
    },
    methods: {
        load_all(){
            this.get_all_mops();
            this.get_all_units();
        },
        get_all_mops(){
            axios.get('api/all_mops')
            .then(({data}) => (this.mops = data));
        },
        get_all_units(){
            axios.get('api/all_units')
            .then(({data}) => (this.units = data));
        },
        
        add_row(index){
            try {
                this.rows.splice(index + 1, 0, {});
            } catch(e)
            {
                console.log(e);
            }
        },
        remove_row(index) {
            this.rows.splice(index, 1);
        },
        store_ppmp(){
            axios.post('api/ppmp', {rows: this.rows}).then(() => {

            }).catch(() => {

            });
        }
    },
    created(){
        this.load_all();
    },
    computed: {
        
    },
    watch: {

    }
}
</script>