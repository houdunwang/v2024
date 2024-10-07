import { FormApi, ReactFormApi, ValidationError, Validator } from '@tanstack/react-form'
import React from 'react'
import { Input } from '../ui/input'
import { Info } from '@icon-park/react'
import { useValidationError } from '@/store/useValidationError'
interface Props {
  form: FormApi<any, Validator<any, any>> & ReactFormApi<any, any>
  name: string
  placeholder: string
}
export const FieldFactory = ({ form, name, placeholder }: Props) => {
  const removeError = useValidationError((s) => s.removeError)
  return (
    <form.Field
      name={name}
      children={(field) => (
        <React.Fragment>
          <Input
            placeholder={placeholder}
            value={field.state.value}
            onChange={(event) => field.handleChange(event.target.value)}
            onFocus={() => removeError(name)}
          />
          <FormValidationError errors={field.state.meta.errors} name={name} />
        </React.Fragment>
      )}
    />
  )
}
type ValidateErrorProps = {
  errors: ValidationError[]
  name: string
}
export function FormValidationError({ errors, name }: ValidateErrorProps) {
  const validateErrors = useValidationError((s) => s.errors)

  if (errors.length === 0 && !validateErrors[name]) return null
  return (
    <div className='border border-primary bg-primary/10 text-primary text-xs px-2 py-1 rounded-sm flex items-center gap-1'>
      <Info /> {validateErrors[name] || errors.join('')}
    </div>
  )
}
