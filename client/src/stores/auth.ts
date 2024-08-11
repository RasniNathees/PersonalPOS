import { defineStore } from 'pinia'
import apiClient from '@/services/ApiClient'
import type { Icredentials } from '@/types/Credentials'
export const useAuthStore = defineStore('auth', {
  state: () => ({
    isAuthenticated: false
  }),
  getters: {},

  actions: {
    async login(loginData: Icredentials) {
      const body = {
        grant_type: 'password',
        client_id: '9cb7e31c-f9c2-492d-82f1-c72916fa766d',
        client_secret: 'DZxGDCgIPOUwZVleHTSyTcyjBOiAm0qs3k0cd2QX',
        username: loginData.email,
        password: loginData.password,
        scope: '*'
      }
      const response = await apiClient.post('/oauth/token', body)
      console.log(response.data)
    }
  }
})
