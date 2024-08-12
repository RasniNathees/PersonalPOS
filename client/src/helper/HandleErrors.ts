import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'
import type { object } from 'yup'

interface CustomErrorResponse {
  response: {
    data: {
      message: string
    }
  }
}
const handleError = (error: unknown): void => {
  if (error && typeof error === 'object' && (error as CustomErrorResponse).response === undefined) {
    toast.error('Please check your internet connection or wait until servers are back online.')
  } else if (error && typeof error === 'object' && (error as CustomErrorResponse).response) {
    const message = (error as CustomErrorResponse).response.data.message
    toast.error(message)
  }
}

export { handleError }
