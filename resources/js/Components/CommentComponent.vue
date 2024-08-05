<template>
  <v-card>
    <v-card-title>Comments</v-card-title>
    <v-card-text>
      <v-list>
        <v-list-item
          v-for="comment in comments"
          :key="comment.id"
        >
          <v-list-item-content>
            <v-list-item-title>{{ comment.user.name }}</v-list-item-title>
            <v-list-item-subtitle>{{ comment.content }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-card-text>
    <v-card-text v-if="authenticated">
      <v-form @submit.prevent="submitComment">
        <v-textarea
          v-model="newComment"
          label="Add a comment"
          outlined
          required
        ></v-textarea>
        <v-btn type="submit" color="primary">Submit</v-btn>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useNuxtApp } from '#app'

const { $api } = useNuxtApp()
const comments = ref([])
const newComment = ref('')
const postId = ref(null)
const authenticated = ref(false)

async function fetchComments() {
  const { data } = await $api.get(`/posts/${postId.value}/comments`)
  comments.value = data
}

async function submitComment() {
  try {
    await $api.post(`/posts/${postId.value}/comments`, { content: newComment.value })
    newComment.value = ''
    await fetchComments()
  } catch (error) {
    console.error('Failed to submit comment', error)
  }
}

onMounted(() => {
  postId.value = route.params.id
  authenticated.value = // Check if the user is authenticated
  fetchComments()
})
</script>
