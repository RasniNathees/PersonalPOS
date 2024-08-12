import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'

const handleError = (error: unknown): void => {
  if (
    error &&
    typeof error === 'object' &&
    (error as { response?: unknown }).response === undefined
  ) {
    toast.error('Please check your internet connection or wait until servers are back online.')
  }
}

export { handleError }
