import { defineStore } from 'pinia'
import apiClient from '@/services/ApiClient'
import { handleError } from '@/helper/HandleErrors'

// types
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
        await apiClient.post('/oauth/token', body)
        localStorage.setItem('auth', 'true');
        this.isAuthenticated = true
      } catch (error: unknown) {
        handleError(error)
      }
    },
    async checkAuth(){
      try{
        const res = await apiClient.get('/checkAuth')
        this.isAuthenticated = true
        localStorage.setItem('user', JSON.stringify(res.data));


      }
      catch (error: unknown) {
        handleError(error)
        this.isAuthenticated = false

      }
    
    }
  }
})
