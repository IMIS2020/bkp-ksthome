<template>
  <div id="wrapper" style="height: 100vh;">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-custom p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand" href="#">
                    <div class="sidebar-brand-icon rotate-n-15 text-white"><i class="fas fa-building"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>S-ILF</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin"><i class="fas fa-home"></i><span>Home</span></router-link></li>
                    <!-- <li class="nav-item">
                        <div class="nav-item dropdown shadow-lg nav-dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-money-bill-wave"></i><span>Dropdown Menu</span></a>
                            <div class="dropdown-menu dr-cs"><a class="dropdown-item" href="#"><i class="fas fa-money-bill-wave"></i>&nbsp;Dropdown Menu</a></div>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin/manage-domains"><i class="fas fa-wrench"></i><span>Manage Domains</span></router-link></li>
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin/manage-application-schedule"><i class="fas fa-calendar-alt"></i><span>Manage Application Schedule</span></router-link></li> -->
                    <li class="nav-item shadow-lg"><router-link v-if="userId =='SU-000001'" class="nav-link" to="/admin/manage-internal-users"><i class="fas fa-wrench"></i><span>Manage Users</span></router-link></li>
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="#"><i class="fas fa-wrench"></i><span>Manage Domains</span></router-link></li>
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin/manage-application-schedule"><i class="fas fa-calendar-alt"></i><span>Manage Application Schedule</span></router-link></li>
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin/manage-application-details"><i class="fas fa-sticky-note"></i><span>Manage Applications</span></router-link></li>
                    <li class="nav-item shadow-lg"><router-link class="nav-link" to="/admin/all-registered-users"><i class="fas fa-user"></i><span>All Registered Users</span></router-link></li>
                    
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" class="grey-bg">
                <nav class="navbar navbar-light navbar-expand shadow topbar static-top top-nav">
                    <div class="container-fluid"><a class="navbar-brand text-uppercase text-white" href="#"><strong>S-ILF scholarships</strong></a><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow dr-not"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><img class="border rounded-circle img-profile" src="https://ui-avatars.com/api/?name=Admin"><span class="d-none d-lg-inline ml-2 text-white-600 small"><strong>{{firstname}} {{middlename}} {{lastname}}</strong></span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                    <router-link class="dropdown-item" to="/admin/all-user-profile"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</router-link>
                                    <router-link v-if="userId == 'SU-000001'" class="dropdown-item" to="/admin/manage-internal-users"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Manage Users</router-link>
                                    <!-- <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a> -->
                                        <div class="dropdown-divider"></div><button class="dropdown-item" role="button" @click.prevent="logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-xl-12 offset-xl-0 px-0">
                            <div class="row my-2">
                                <div class="col-xl-12 offset-xl-0">
                                    <h4 class="mb-0 p-head">Manage Users</h4>
                                </div>
                            </div>
                            <div class="com-bg">
                                <div>
                                    <div class="form-group pull-right col-xl-12 mb-2 mt-2">
                                        <div class="row">
                                            <div class="col-xl-12" style="padding: 0px 5px;">
                                                <form>
                                                    <div class="form-group mb-0">
                                                        <div class="form-row">
                                                             <div class="col-xl-2 align-self-center">
                                                                <div class="form-group">
                                                                    <select class="form-control" v-model="filterForm.userId">
                                                                            <option value="">-- User ID --</option>
                                                                            <option v-for="filterUser in getFilterUsers" :key="filterUser.id" 
                                                                                    :value="filterUser.intuId" class="color-mg">
                                                                                        {{filterUser.intuId}} 
                                                                                    </option>
                                                                                </select>
                                                                           </div>
                                                                     </div>

                                                               <div class="col-xl-2 align-self-center">
                                                                    <div class="form-group">
                                                                    <input class="form-control" type="email"  v-model="filterForm.email" placeholder="-- email address --">
                                                                 </div>
                                                               </div>

                                                            <div class="col-xl-2 align-self-center">
                                                              <div class="form-group">
                                                                 <input class="form-control" type="email" v-model="filterForm.contactNo" placeholder="--contact no --">
                                                                  </div>
                                                               </div>

                                                        
                                                            <div class="col-xl-1 align-self-center">
                                                                <div class="form-group">
                                                                <a class="btn btn-sm btn-mg" role="button" @click.prevent="filterData"><i class="fa fa-search"></i></a>
                                                                <button class="btn btn-mg font-sm" role="button" @click.prevent="resetForm"><i class="fa fa-refresh"></i></button>
                                                                </div>
                                                                </div>
                                                            <div class="col-xl-3 offset-xl-1 align-self-center and-col ml-auto">
                                                                <form>
                                                                    <div class="form-group mb-0">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-4 col-xl-4 offset-xl-0 align-self-center">
                                                                                <p class="text-right mb-0 mt-0 font-sm"><strong>Add New User</strong></p>
                                                                            </div>
                                                                            
                                                                           
                                                                            <div class="col-sm-4 col-xl-4 offset-xl-0 text-right align-self-center">
                                                                                <p class="text-left mb-0 font-sm"><strong>&nbsp;</strong>
                                                                                <a href="#" data-toggle="modal" data-target="#add-sys-user"><strong>Click here</strong></a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <!-- <div class="col-sm-4 col-xl-2 offset-xl-10 text-right align-self-center mt-1"><input class="form-control form-control-sm search form-control" type="text" placeholder="Search by typing here.." style="font-size: 12px;"></div> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive text-break table results mb-0 tmd">
                                        <table class="table table-sm">
                                            <thead class="cs-tbl-hd">
                                                <tr>
                                                <th class="w-10x">SL No.</th>
                                                <th>User ID</th>
                                                <th>User Details</th>
                                                <th>Contact Details</th>
                                                <th class="text-center w-15x">Status</th>
                                                <th class="text-center w-5x">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="h-38x">
                                            <tr v-for="(eachUsers,i) in getAllUsers" :key="i" class="font-sm text-black">
                                                <td class="w-10x font-sm">{{i+1}}</td>
                                                <td class="text-break font-sm">{{eachUsers.intuId}}</td>
                                                <td class="font-sm mt-2">Name : {{eachUsers.firstname}} {{(eachUsers.middlename)?" "+eachUsers.middlename:''}} {{eachUsers.lastname}} <br> Gender : {{eachUsers.gender}}</td>
                                                <td class="font-sm mt-2">Contact No : {{eachUsers.contactNo}}  <br>Email ID : {{eachUsers.email}}</td>
                                                <td class="text-center w-15x">
                                                    <span v-if="eachUsers.status == true" class="badge badge-pill badge-success font-sm mt-2">Active</span>
                                                    <span v-else class="badge badge-pill badge-danger font-sm mt-2">Inactive</span>
                                                    </td>

                                                <td class="text-center w-5x" v-if="eachUsers.intuId == 'SU-000001'" >
                                                    <div  class="dropdown no-arrow dr-all">
                                                        <button class="btn btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-bars"></i></button>
                                                         <div  class="dropdown-menu dropdown-menu-left shadow dropdown-menu-right animated--fade-in">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add-sys-user" @click="getUserdata(eachUsers.intuId)"><strong>Edit User</strong></a>
                                                            <!-- <a class="dropdown-item" href="#"><strong>Delete User</strong></a> -->
                                                            <!-- <a class="dropdown-item" href="#"><strong>Deactivate User</strong></a> -->
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-center w-5x" v-else>
                                                    <div  class="dropdown no-arrow dr-all">
                                                        <button class="btn btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-bars"></i></button>
                                                         <div  class="dropdown-menu dropdown-menu-left shadow dropdown-menu-right animated--fade-in">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add-sys-user" @click="getUserdata(eachUsers.intuId)"><strong>Edit User</strong></a>
                                                            <button class="dropdown-item" @click.prevent="removeUser(eachUsers.intuId)"><strong>Delete User</strong></button>

                                                            <a href="#" class="dropdown-item" @click.prevent="toggleStatus(eachUsers.intuId)"><strong>{{(eachUsers.status == true)? "Inactive" : "Active"}} User</strong></a>
                                                            <!-- <a class="dropdown-item" href="#"><strong>Deactivate User</strong></a> -->
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
          <!-- Start: Add User Modal -->
        <div>
            <form>
                <div class="modal fade" role="dialog" tabindex="-1" id="add-sys-user">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title color-mg"><strong>{{form.intuId ? 'Update':'Add'}} {{form.intuId == 'SU-000001'?'Super':'Internal'}} User  {{form.intuId == '' ? '' : '( USER ID : '+form.intuId+')'}} </strong></h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                          
                              
                           <div class="modal-body cs-modal-body">
                                <div class="form-row">

                                    <div class="col-xl-4 mb-2">
                                        <label>First Name&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" v-model="form.firstname" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <label>Middle Name&nbsp;</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" v-model="form.middlename">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <label>Last Name&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" v-model="form.lastname" required>
                                        </div>
                                    </div>

                                     <!-- <div class="col-xl-3 mb-2">
                                        <label>Date of Birth&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="date" v-model="form.dob" required>
                                        </div>
                                    </div> -->

                                     <div class="col-xl-4 mb-2">
                                        <label>Gender&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <select class="form-control " v-model="form.gender" required>
                                                <option value="" selected="" disabled>-- select one --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female" >Female</option>
                                         </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <label>Contact No&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" v-model="form.contactNo" maxlength="10" required>
                                        </div>
                                    </div>

                                    <!-- <div class="col-xl-3 mb-2">
                                        <label>Alternate Contact No</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" maxlength="10" v-model="form.alternateContactNo">
                                        </div>
                                    </div> -->

                                    <div class="col-xl-4 mb-2">
                                        <label>Email Address&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="email"  v-model="form.email" required>
                                        </div>
                                    </div>

                                    <!-- <div class="col-xl-4 mb-2">
                                        <label>Password&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="password"  v-model="form.password" required>
                                        </div>
                                    </div>
                                     -->

                                    <!-- <div class="col-xl-6 mb-2">
                                        <label>Password&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="password" v-model="form.password" required>
                                        </div>
                                    </div> -->

                                     <!-- <div class="col-xl-6 mb-2">
                                        <label>Status&nbsp;<span class="text-danger"><strong>*</strong></span></label>
                                        <select class="form-control " v-model="form.status" required>
                                            <option value=""  disabled>-- select one --</option>
                                            <option value="1">Active</option>
                                            <option value="0" >Inactive</option>
                                         </select>
                                    </div> -->
                               </div>
                            </div>
                            
                            <div class="modal-footer">
                               <button class="btn btn-sm btn-custom btn-smd" type="submit" @click.prevent="saveForm"><strong>{{form.intuId?'Update':'Add'}} User</strong></button>
                               <button class="btn btn-sm btn-cancel btn-smd" type="button" data-dismiss="modal" @click="clearData"><strong>Close</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End: Add User Modal -->
       </div>
       
</template>
<script>
export default {
    data(){
        return{
            getAllUsers:{},
            getFilterUsers:{},
            userId     : document.querySelector("meta[name='userId']").getAttribute('content'),
            firstname  : document.querySelector("meta[name='firstname']").getAttribute('content'),
            middlename : document.querySelector("meta[name='middlename']").getAttribute('content'),
            lastname   : document.querySelector("meta[name='lastname']").getAttribute('content'),

                form:{
                intuId:'',
                firstname:'',
                middlename:'',
                lastname:'',
                gender:'',
                contactNo:'',
                email:'',
                password:'',
            },

            filterForm:
            {
                userId:'',
                contactNo:'',
                email:'',
            },
          }
    },
    methods:{
           saveForm(){

               if(this.form.intuId!=''){

                axios.post('/admin/admin-api/edit-users/'+this.form.intuId,this.form)
                .then(() =>{this.$fire({
                  position:'top',
                  icon: 'success',
                  title: 'User Updated',
                  showConfirmButton: false,
                  timer: 4000
               }).then(() =>{
                  this.$router.push({ 
                     name:"manage-users",
               }); 
               this.getData();
               this.form.firstname = '';
               this.form.middlename= '';
               this.form.lastname = '';
               this.form.email = '';
               this.form.contactNo='';
               this.form.gender='';
               
            })
            }).catch((error) =>{
                     if(error.response.status == 422 || error.response.status == 405 || error.response.status == 500 )
                     {   this.$fire({
                           position: 'top',
                           icon: 'error',
                           title: "Contact no or Email address already exists !",
                           showConfirmButton: false,
                           timer: 4000
                        })
                     }
                  })
               }

               else{
                axios.post('/admin/admin-api/add-users',this.form)
                .then(() =>{this.$fire({
                  position:'top',
                  icon: 'success',
                  title: 'User Added',
                  showConfirmButton: false,
                  timer: 4000
               }).then(() =>{
                  this.$router.push({ 
                     name:"manage-users",
               }); 
               this.form.firstname = '';
               this.form.middlename= '';
               this.form.lastname = '';
               this.form.email = '';
               this.form.contactNo='';
               this.form.gender='';
               this.getData()
            })
            }).catch((error) =>{
                     if(error.response.status == 422 || error.response.status == 405 || error.response.status == 500 )
                     {   this.$fire({
                           position: 'top',
                           icon: 'error',
                           title: "Contact no or Email address already exists !",
                           showConfirmButton: false,
                           timer: 4000
                        })
                     }
                  })
                }
               },

                resetForm()
                {
                    this.filterForm.userId    = '';
                    this.filterForm.contactNo = '';
                     this.filterForm.email    = '';
                    this.getData();
                },

                getData(){
                    axios.get('/admin/admin-api/get-all-users')
                    .then(response => {
                        this.getAllUsers = response.data
                    });
                    axios.get('/admin/admin-api/get-all-users/filter/data')
                        .then(response => this.getFilterUsers = response.data)
                },

                getUserdata(userId){
                 
                axios.get('/admin/admin-api/get-users/'+userId)
                    .then(response => {
                        this.form = response.data[0];
                        // console.log(response.data[0]);
                    });
                },

                clearData()
                {   this.getData();
                    this.form.firstname = '';
                    this.form.middlename= '';
                    this.form.lastname = '';
                    this.form.email = '';
                    this.form.contactNo='';
                    this.form.gender='';
                    this.form.intuId='';
                },

                removeUser(userId){
                    if(userId != '')
                    {
                    axios.get('/admin/admin-api/delete-users/'+userId)
                    .then(()=>{
                        this.$fire({
                        position:'top',
                        icon: 'success',
                        title: 'User Deleted',
                        showConfirmButton: false,
                        timer: 4000
                        })//swal-fire end
                    }).then(() => {
                            this.getData();
                        })
                    }
                },//removeuser end


                    toggleStatus(userId){
                        axios.post('/admin/admin-api/user-status-changed/'+userId)
                            .then( this.$fire({
                                position: 'top',
                                icon: 'success',
                                title: 'User Status Changed',
                                showConfirmButton: false,
                                timer: 4000
                            }))
                        this.getData();
                    },
                        logout(){
                            axios.get('/admin/logout').then(function(){
                                document.location.href = "/admin/login";
                            })
                        },

                    filterData(){
                        axios.post('/admin/admin-api/manage-internal-user/filter', this.filterForm)
                            .then(response => console.log(this.getAllUsers = response.data)).catch((error) =>{
                            this.errors = error.response.data.errors;
                        })
                        },
                    },

            created()
            {
            this.getData();
            
            
            }
        }
</script>