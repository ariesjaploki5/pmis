te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Employe</div>
				</div>
				<div class="col">
					<div class="card-tools text-right">
						<button class="btn btn-primary btn-sm">Add</button>
					</div>
				</div>
			</div>
           <table class="table">
           		<thead>
           			<tr>
           				<th>Employee ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th></th>
           				<th></th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="employee in employees.data" :key="employee.id">
           				<td>{{ employee.employeeid }}</td>
           				<td>{{ employee.firstname }}</td>
						<td>{{ employee.lastname }}</td>
           				<td></td>
           			</tr>
           		</tbody>
           </table> 
        </div>
		<div class="card-footer">
			<pagination :data="employees" @pagination-change-page="pages_employees"></pagination>
		</div>
    </div>  
</template>
<script>
    export default {
		data() {
			return{
                employees: {},
                form: new Form({
                    id: '',
					firstname: '',
					lastname: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_employees();
            },
            get_employees(){
                axios.get('api/employees')
                .then(({data}) => (this.employees = data));
			},
			pages_employees(page = 1){
				axios.get('api/employees?page=' + page)
                .then(response => {this.employees = response.data;});
			},
            create_unit(){
                
            },
            store_unit(){

            },
            edit_unit(unit){

            },
            update_unit(){

            },
		},
		created(){
            this.load_all();
		}
    }
</script>