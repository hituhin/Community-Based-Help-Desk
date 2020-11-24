<template>


<div class="mycheckgroup">
  




    <div class="content-body">

        <div id="card-actions">
            <div class="row">
                <div class="col-xs-12">

                   <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Messenger</h4>
                         <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                         <div class="heading-elements">
                             <ul class="list-inline mb-0">
                               <li v-if="activeFriend"><a class="btn btn-success btn-lg" :data-info="activeFriend" style="    color: white; padding: 3px 5px;" id="make-meeting">Request for meeting</a></li>
                               <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                               <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="card-body collapse in">
                         <div class="card-block">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 mb-2">

                                    <div class="card" style="height: 436px;">
                                        <div class="card-header">
                                            <h4 class="card-title">Contacts</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                        </div>

                                        <div class="card-body">

                                            <ul class="list-group list-group-flush"  style="height: 300px">
                                                <li class="list-group-item mymsgli" style="padding: 10px 7px; padding-bottom: 0px; padding-top: 14px;">
                                                    <fieldset class="form-group position-relative ">
                                                        <div class="input-group">
                                                            <input id="myInput" type="text" placeholder="Search contact"  class="form-control input-lg" style="height: 32px; font-size: 16px;"> 
                                                            <span  class="input-group-addon btn btn-success rounded rounded-right" ><i class="icon-android-search font-medium-4"></i></span>
                                                        </div>
                                                    </fieldset>                                                
                                                </li>
                                                <div style="height: 400px; overflow-y:scroll;" id="myList" >
                                                        


                                                    <li class="list-group-item mymsgli " style="padding: 10px 7px;"

                                                        v-for="friend in friends"
                                                        :key="friend.id"
                                                        @click="activeFriend=friend.id"
                                                        

                                                        :class="(friend.id == activeFriend)?'active_chat':''"


                                                    >
                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img class="media-object rounded-circle" :src="friend.image" alt="image" style="width: 50px;height: 50px;" />
                                                            </a>
                                                            <div class="media-body">
                                                                <p class="media-heading" style="font-size: 16px; font-weight: 600;">{{friend.name}}


                                                                    <span v-if="(onlineFriends.find(onlineFriend => onlineFriend.id === friend.id))" class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0;">online</span>

                                                                    <span v-else class="tag tag-default tag-pill bg-danger " style="font-size: 12px; padding: 2px 5px; margin: 0;">offline</span>



                                                                    
                                                                </p>
                                                                <p style="margin: 0px; margin-top: -8px; font-size: 14px;">Click here to start conversation</p>                                                                    
                                                            </div>
                                                        </div>   
                                                    </li>


                                                </div>
                                           </ul>
                                         </div> <!-- card -body -->
                                        
                                    </div> <!-- card -->
                                </div> <!-- col-xl-4 col-lg-4 mb-2 -->

                                <div class="col-xl-8 col-lg-8">
                                    <div class="card" >
                                        <div class="card-header">
                                            <div class="card-title">
                                                <div class="media">
                                                    <a class="media-left" href="#">
                                                        <img class="media-object rounded-circle" :src="activeFriendImg" alt="image" style="width: 40px;height: 40px;">
                                                    </a>
                                                    <div class="media-body">
                                                        <p class="media-heading" style="font-size: 16px; font-weight: 600; margin-top: 7px;">
                                                            {{activeFriendName}}
                                                            
                                                            <!-- <span class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0px;">online</span>  -->                                                 
                                                            
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    
                                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                                    <li>

                                                        <a  class="dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-android-settings"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Block</a>
                                                            <a class="dropdown-item" href="#">Clear All</a>
                                                            
                                                            
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card-body collapse in" style="height: 400px; overflow-y: scroll;" id="privateMessageBox">
                                            <div class="card-block" >
                                         

                                                <div v-for="(message, index) in allMessages" 
                                                :key="index"

                                                :class="(user.id !== message.user_id)?'incoming':'outgoing'"  :style="(user.id !== message.user_id)? 'width: 70%; float: left; margin-bottom: 15px;' : 'float: right; width: 60%; margin-bottom: 15px;'"

                                                >
                                                    <div class="media" v-if="user.id !== message.user_id">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object rounded-circle" :src="activeFriendImg" alt="image" style="width: 40px;height: 40px;">
                                                        </a>
                                                        <div class="media-body">
                                                            <p style="background: #ebebeb none repeat scroll 0 0; color: #646464; font-size: 14px; margin: 0; padding: 5px 10px 5px 12px; display: inline-block;"> {{message.message}}</p>
                                                            <span style="color: #747474; display: block; font-size: 12px; margin: 8px 0 0;">{{message.msgtime}}</span>
                                                        </div>
                                                    </div>

                                                    <div v-else class="msg_out" style=" float: right; max-width: 83%; ">
                                                        <p style="background: #05728f none repeat scroll 0 0;border-radius: 3px; font-size: 14px; margin: 0;color: #fff; padding: 5px 10px 5px 12px; display: inline-block; ">
                                                            {{message.message}}
                                                        </p>
                                                        <span style="color: #747474; display: block; font-size: 12px; margin: 8px 0 0; "> {{message.msgtime}}</span>
                                                    </div>

                                                </div>

                                                
                                            </div>
                                        </div>
  
                                        <div class="card-block" style="padding-top: 0;">
                                            <fieldset class="form-group position-relative "><div class="input-group">

                                                <input

                                                v-model="message"
                                                @keyup.enter="sendMessage"


                                             type="text" placeholder="Type your message" name="q" value="" class="form-control  input-lg" style=""> <span @click="sendMessage" class="input-group-addon btn btn-success rounded rounded-right"><i class="icon-android-send font-medium-4"></i></span></div></fieldset>
                                        </div>



                                       
                                       
                                    </div>
                                </div> <!-- col-xl-8 col-lg-8 -->

                            </div> <!-- row -->

                             
                         </div> <!-- card-block -->
                     </div>
                   </div>
                </div>

             </div>
         </div>
    </div>



</div> <!-- end my mycheckgroup -->



</template>

<script>

$(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          
        });
      });
    });



  export default {
    props:['user', 'activatee'],
    
    data () {
      return {
        message:null,
        activeFriend: null,
        activeFriendImg: '/img/user.png',
        onlineFriends:[],
        allMessages:[],
        activeFriendName: "Please select any contact",
        users:[],
      }
    },


    computed:{

      friends(){
        return this.users.filter((user)=> {
          return user.id !== this.user.id;
        });
      },

    },


    watch:{
      activeFriend(val){
        this.fetchMessages();

        this.scrollToEnd();
      }
    },


    methods:{
     
        sendMessage(){
            //check if there message
            if(!this.message){
                return alert('Please enter message');
            }
            if(!this.activeFriend){
                return alert('Please select friend');
            }
            axios.post('/private-messages/'+this.activeFriend, {message: this.message}).then(response =>{
                    this.message=null;
                    this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
              });
        },
        fetchUsers() {
            axios.get('/users').then(response => {
                this.users = response.data;

                console.log(response.data);

            });
        },

        fetchMessages() {
            if(!this.activeFriend){
                return alert('Please select friend');
            }
            
            axios.get('/private-messages/'+this.activeFriend).then(response => {
                this.allMessages = response.data;


                console.log(response.data[0]);
                


               
            });

            axios.get('/private-messages-user/'+this.activeFriend).then(response => {


                this.activeFriendName = response.data.name;
                this.activeFriendImg = response.data.image;

                // console.log(response.data);
               
               
            });
        },

        scrollToEnd(){
            document.getElementById('privateMessageBox').scrollTo(0,99999);
        }

    },

    created(){

        // this.activeFriend = this.activatee ;

        this.fetchUsers();


        //check user online user 
    //here users data come from channels.php 
        Echo.join(`privateonlineuser`)
            .here((users) => {
              // console.log(users)

              //it will show all users who are online
              this.onlineFriends = users;

            })
            .joining((user) => {
                // console.log(user.name);
                // 
                this.onlineFriends.push(user);
             })
            .leaving((user) => {
              // console.log(user.name);
              // 
              this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
          });






          Echo.private('privatechatapp.'+this.user.id)
          .listen('PrivateMessageSent',(e)=>{

            if (this.activeFriend == e.message.user_id){
                
                this.allMessages.push(e.message)

            }
            // this.activeFriend=e.message.user_id;
            //this.allMessages.push(e.message)
            setTimeout(this.scrollToEnd,100);
          });
     
    }

    
}

</script>


