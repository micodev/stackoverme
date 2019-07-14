<template>
  <div class="ui fluid piled raised segments">
        <div v-for="comment in comments" v-bind="comment" :key="comment.id" class="ui segment blue">
                            <!-- commentId="{{ $comment->id}}"-->
                            <a class="ui grey ribbon label"  :commentId="comment.id" > <i class="info icon"></i> </a>
                            <div class="ui divider horizontal clearing"></div>
                            <h2 class="ui tiny header d-inline comment-seg">
                                <i class="user icon"></i>
                                <div class="content">
                                    {{ comment.user.name }}
                                   <!-- {{ $comment->user->name }} -->
                                    <i class="check primary circle icon"></i>
                                    <div class="sub header">
                                            {{ comment.user.role == 10 ? "User":"Lecturer" }}
                                            <!-- {{ $comment->user->role==10 ? "User" : "Lecturer" }} -->
                                    </div>

                                </div>
                            </h2>

                            <div class="ui tall stacked segment comment_body">
                                    <div class="activatior" v-html="comment.description">
                                    {{  comment.description }}
                                      <!--{!! $comment->description !!}-->
                                    </div>
                                    <div class=" ui flowing popup bottom left transition hidden">
                                            <button class="ui icon button" aria-label="is_correct">
                                                <i class="check icon green"></i>
                                            </button>
                                            <button class="ui labeled icon button red right  seg-attached-left c-submenu"
                                                aria-label="label">
                                                <i class="like icon"></i>
                                                30
                                            </button>
                                            <button class="ui  icon button comment-button blue right c-submenu"
                                             @click="onCommandButtonClicked(comment)"> <!--//  commentId="{{ $comment->id}}" -->
                                                <i class="comment alternate icon"></i>
                                            </button>
                                            <button class="ui icon button blue seg-attached-right c-submenu" aria-label="label">
                                                <i class="share icon"></i>
                                            </button>

                                    </div>
                                    <h4 class="ui horizontal divider header">
                                        <i class="tag icon"></i>
                                        Attachments
                                    </h4>

                                    <div class="ui horizontal list">
                                        <div v-for="image in comment.images" v-bind="image" :key="image.id" class="item" style="width:50px !important">
                                            <a class="ui image medium label" style="padding-right:0px !important;width:100% !important;">

                                                 <img :src="img_attribue(image.image)[0]" :thumb="img_attribue(image.image)[1]" onclick=lightit(this) style="margin: 0;width:100% !important;">
                                            </a>
                                        </div>
                                        <!-- @foreach ($comment->Images()->get() as $image )
                                         <div class="item" style="width:50px !important"><a class="ui image medium label" style="padding-right:0px !important;width:100% !important;"><img {{ $image->image }} onclick=lightit(this) style="margin: 0;width:100% !important;"></a></div>
                                          @endforeach
                                          -->
                                    </div>



                            </div>

                            <div class="ui celled list">
                             <div v-for="sub in comment.sub_comments" v-bind="sub" :key="sub.id" class="ui tiny comment-seg" style="margin-top:10px;">

                                        <i class="ui avatar user icon"></i>
                                        <a class="header">{{ sub.user.name }}</a>
                                        <div class="content">

                                            <div class="description d-inline" >
                                                    <!-- Last seen watching <a
                                                    class="header d-inline"><b>@micodev</b></a> just now.  -->
                                                    {{ sub.description }}
                                            </div>
                                            <button class="circular ui icon right floated mini button">
                                                <i class="reply icon"></i>
                                            </button>
                                        </div>
                                        <div class="ui fitted divider" style="margin-top:13px;"></div>

                             </div>
                            <!--    @foreach ($comment->Subcomments()->get() as $subcomment )
                                <div class="item" style="margin-top:10px;">

                                        <i class="ui avatar user icon"></i>
                                        <div class="content">
                                            <a class="header">{{ $subcomment->User->name }}</a>
                                            <div class="description d-inline" style="margin-top: 12px;">
                                                    {{--  Last seen watching <a
                                                    class="header d-inline"><b>@micodev</b></a> just now.  --}}
                                                    {{ $subcomment->description }}
                                            </div>
                                            <button class="circular ui icon right floated mini button">
                                                <i class="reply icon"></i>
                                            </button>
                                        </div>


                                    </div>
                                @endforeach -->


                            </div>
                        </div>

                        <!-- comment modal -->
                        <div class="ui large modal">
                            <div class="header">
                                <span class="ui medium red text">A</span>dd a comment
                            </div>
                            <div class="content">

                                <div class="ui left corner labeled input fluid">
                                    <input type="text" placeholder="Insert comment here..." class="subcomment_field" v-model="subComment">
                                    <div class="ui left corner label">
                                        <i class="comment icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="actions">
                                <div class="ui negative button">
                                    cancel
                                </div>
                                <div class="ui positive right labeled icon button" @click="make_sub_comment">
                                    send
                                    <i class="checkmark icon"></i>
                                </div>
                            </div>
                        </div>
  </div>

</template>

<script>
export default {
        props: ['post_id'],
        data() {
            return {
                subComment:null,
                comments: [],
                commendId:0,
            }
        },
        methods:{

            read() {

                window.axios.get('/api/comments/'+this.post_id).then(({ data }) => {
                    data.forEach(dat => {
                        this.comments.push(dat);
                        //this.comments.forEach()
                    });

                });

            },
            img_attribue(str){
                var strr = str.replace("src=","").replace("thumb=","");
                var strr_array = strr.split(" ");

                return strr_array;
            },
            onCommandButtonClicked(comment){
                this.commendId = comment.id;
                $('.ui.modal')
                .modal({
                    centered: true,
                    blurring: true,
                    transition: 'zoom'
                }).modal('show');
            },
            make_sub_comment()
            {
                var post = {
                            "commentId" : this.commendId,
                            "comment" : this.subComment
                        };
                  window.axios.post('/api/comments/'+this.post_id+'/subcomment', post).then(({ data }) => {
                        var comment = this.comments.filter(function(comment){
                            return comment.id ==data[0];
                        });
                        comment[0].sub_comments.push(data[1]);
                        this.subComment="";
                        this.commendId=0;

                });
            }

        },
        beforeMount(){

        },
        mounted() {
            console.log('component mounted')
        },
        created(){
            this.read();
        }

    }
</script>
