import { defineStore } from 'pinia'
import apiClient from '@/services/ApiClient'
import type { Icredentials } from '@/types/Credentials'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    isAuthenticated: false
  }),
  getters: {
    getIsAuthenticated(state) {
      return () => state.isAuthenticated
    }
  },

  actions: {
    async login(loginData: Icredentials) {
      const body = {
        grant_type: 'password',
        client_id: `${import.meta.env.VITE_Client_ID}`,
        client_secret: `${import.meta.env.VITE_Client_Secret}`,
        username: loginData.email,
        password: loginData.password,
        scope: '*'
      }
      try {
        const response = await apiClient.post('/oauth/token', body)
        this.isAuthenticated = true
      } catch (error) {
        // console.log(error)
        // console.log(error.response.data.errors)
      }
    }
  }
})
