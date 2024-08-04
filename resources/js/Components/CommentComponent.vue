<template>
    <div>
      <h3>Comments</h3>
      <div v-for="comment in comments" :key="comment.id">
        <p>{{ comment.content }}</p>
        <small>by {{ comment.user.name }}</small>
      </div>
      <div v-if="authenticated">
        <textarea v-model="newComment" placeholder="Write a comment..."></textarea>
        <button @click="postComment">Post Comment</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['postId', 'authenticated'],
    data() {
      return {
        comments: [],
        newComment: '',
      };
    },
    mounted() {
      this.fetchComments();
    },
    methods: {
      fetchComments() {
        axios.get(`/api/posts/${this.postId}/comments`).then(response => {
          this.comments = response.data;
        });
      },
      postComment() {
        axios.post(`/api/posts/${this.postId}/comments`, { content: this.newComment })
          .then(response => {
            this.comments.push(response.data);
            this.newComment = '';
          });
      }
    }
  }
  </script>
  