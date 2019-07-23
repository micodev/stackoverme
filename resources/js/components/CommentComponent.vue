<template>
  <div class="ui fluid piled raised segments">
    <div v-for="comment in scomments" v-bind="comment" :key="comment.id" class="ui segment blue">
      <!-- commentId="{{ $comment->id}}"-->
      <!-- class="ui grey ribbon label" -->
      <a
        v-bind:class="[comment.is_correct ? 'green' : 'grey','ui ribbon label']"
        :commentId="comment.id"
      >
        <!--   class="info icon"-->
        <i v-bind:class="[comment.is_correct ? 'check icon' : 'info icon']"></i>
      </a>

      <div v-if="comment.user_id==user_id" class="ui top right attached label" style="background-color: transparent !important;">
        <div class="ui tiny top left pointing dropdown button" style="background-color:transparent">
            <i class="ellipsis vertical icon"></i>
            <div class="menu">
                <div class="header">Choose option</div>
                <div class="item">Edit</div>
                <div class="item">Delete</div>
            </div>
        </div>
      </div>
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
        <div
          v-bind:class="'activatior'"
          @click="onclickPopup(comment.id)"
          v-html="comment.description"
          style="min-height:100px;"
        >{{ comment.description }}</div>

        <div class="ui fitted divider" style="margin-bottom:19.600px;"></div>
        <div class="ui buttons d-inline" style="margin-top:10px;display:inline !important;">
          <button
            v-bind:class="[comment.is_correct==1?'grey':'green','ui icon button c-submenu']"
            @click="isCorrectFun(comment.id)"
            :aria-label="comment.id"
          >
            <i v-bind:class="[comment.is_correct==1?'green':'white','check icon']"></i>
          </button>
          <button
            v-bind:class="[islike(comment.id)?'grey':'red','ui labeled icon button  right seg-attached-left c-submenu']"
            :style="[islike(comment.id)?{'color' : '#d01919'}:'']"
            @click="commentLike(comment.id)"
            aria-label="label"
          >
            <i v-bind:class="[islike(comment.id)?'red':'','like icon']"></i>
            {{ likes(comment.id) }}
          </button>
          <button
            class="ui icon button comment-button blue right c-submenu"
            @click="onCommandButtonClicked(comment)"
          >
            <!--   commentId="{{ $comment->id}}" -->
            <i class="comment alternate icon"></i>
          </button>
          <button class="ui icon button blue seg-attached-right c-submenu" @click="copy(comment.id)" aria-label="label" >
            <i class="share icon"></i>
          </button>
          <div
            v-if="comment.images.length>0"
            class="ui relaxed horizontal list"
            style="display:inline-block;float:right"
          >
            <div
              v-for="image in comment.images"
              v-bind="image"
              :key="image.id"
              class="item"
              style="width:50px !important"
            >
              <a
                class="ui image medium label"
                style="padding:0px !important;width:16.512 !important;"
              >
                <img
                  :src="img_attribue(image.image)[0]"
                  :thumb="img_attribue(image.image)[1]"
                  onclick="lightit(this)"
                  style="margin: 0;width:100% !important;"
                />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="ui celled list">
        <div
          v-for="sub in comment.sub_comments"
          v-bind="sub"
          :key="sub.id"
          class="ui tiny comment-seg"
          style="margin-top:10px;"
        >
          <i class="ui avatar user icon"></i>
          <a class="header">{{ sub.user.name }}</a>
          <div class="content">
            <div class="description d-inline">
              <!-- Last seen watching <a
              class="header d-inline"><b>@micodev</b></a> just now.-->
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
        @endforeach-->
      </div>
    </div>

    <!-- comment modal -->
    <div class="ui large modal">
      <div class="header">
        <span class="ui medium red text">A</span>dd a comment
      </div>
      <div class="content">
        <div class="ui left corner labeled input fluid">
          <input
            type="text"
            placeholder="Insert comment here..."
            class="subcomment_field"
            v-model="subComment"
          />
          <div class="ui left corner label">
            <i class="comment icon"></i>
          </div>
        </div>
      </div>
      <div class="actions">
        <div class="ui negative button">cancel</div>
        <div class="ui positive right labeled icon button" @click="make_sub_comment">
          send
          <i class="checkmark icon"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//this.$clipboard("test");
export default {
  props: ["post_id", "user_id"],
  data() {
    return {
      subComment: null,
      comments: [],
      commendId: 0
    };
  },
  computed: {
    scomments: function() {
      return this.comments.slice().sort(function(a, b) {
        return b.is_correct - a.is_correct;
      });
    }
  },
  methods: {
    copy : function(id){

            this.$clipboard( window.location.origin + window.location.pathname + "#" + id);
    },
    likes:function(id){
        var comment = this.comments.filter(function(comment){return comment.id ==id});
        var likes = comment[0].clikes.length;
        return likes;
    },
    islike: function(id) {
      var comment = this.comments.filter(function(comment) {
        return comment.id == id;
      });

      if (comment[0].clikes != null && comment[0].clikes.length > 0) {
        var user = this.user_id;
        var clik = comment[0].clikes.filter(function(clike) {
          var cl = clike.user_id;
          return cl == user;
        });

        return clik.length == 1;
      } else return false;
    },
    commentLike(id) {

      var post = {
        commentId: id
      };
      window.axios
        .post("/api/comments/" + this.post_id + "/cLike", post)
        .then(({ data }) => {
          var comment = this.comments.filter(function(comment) {
            return comment.id == id;
          });
          if (data[0] == "like") {
            comment[0].clikes.push(data[1]);
          } else if (data[0] == "unlike") {
            var user = this.user_id;
            var clike = comment[0].clikes.filter(function(clike) {
              var cl = clike.user_id;
              return cl == user;
            });
            console.log(clike);
            comment[0].clikes.splice(comment[0].clikes.indexOf(clike[0]), 1);
          } else console.log("error");
          // data.forEach(dat => {
          // });
        });
    },
    read() {
      window.axios.get("/api/comments/" + this.post_id).then(({ data }) => {
        data.forEach(dat => {
          dat.activater = false;
          this.comments.push(dat);

          //console.log(this.comments);
          //this.comments.forEach()
        });
        //this.comments = this.scomments(this.comments);
        //  console.log();
        //console.log("this : "+ this.sortedArray);
      });
    },
    img_attribue(str) {
      var strr = str.replace("src=", "").replace("thumb=", "");
      var strr_array = strr.split(" ");

      return strr_array;
    },
    onCommandButtonClicked(comment) {
      this.commendId = comment.id;
      $(".ui.modal")
        .modal({
          centered: true,
          blurring: true,
          transition: "zoom"
        })
        .modal("show");
    },
    make_sub_comment() {
      var post = {
        commentId: this.commendId,
        comment: this.subComment
      };
      window.axios
        .post("/api/comments/" + this.post_id + "/subcomment", post)
        .then(({ data }) => {
          var comment = this.comments.filter(function(comment) {
            return comment.id == data[0];
          });
          comment[0].sub_comments.push(data[1]);
          this.subComment = "";
          this.commendId = 0;
        });
    },

    onclickPopup(id) {
      var commenta = this.comments.filter(function(comment) {
        return comment.id == id;
      });
      var commentb = this.comments.filter(function(comment) {
        return comment.activater == true;
      });

      if (commentb.length > 0) commentb[0].activater = false;
      if (commenta.length > 0) commenta[0].activater = true;
    },
    isCorrectFun(id) {
      var commenta = this.comments.filter(function(comment) {
        return comment.id == id;
      });

      var post = {
        commentId: commenta[0].id
      };
      window.axios
        .post("/api/comments/" + this.post_id + "/validate", post)
        .then(({ data }) => {
          var comment = this.comments.filter(function(comment) {
            return comment.is_correct == 1;
          });

          if (commenta.length > 0 && commenta[0].is_correct == 0)
            commenta[0].is_correct = 1;
          else if (comment.length > 0 && comment[0].is_correct == 1)
            comment[0].is_correct = 0;
          if (comment.length > 0) comment[0].is_correct = 0;
        });
    }
  },

  beforeMount() {},
  mounted() {
    console.log("component mounted");
  },
  created() {
    this.read();
  }
};
</script>
