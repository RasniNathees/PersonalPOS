import axios from 'axios'

const apiClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_URL}`, // Update with your server's API base URL
  withCredentials: true // Send cookies with each request
})

export default apiClient
