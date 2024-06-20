import classnames from 'classnames'
import { Button } from './ui/button'
import { Input } from './ui/input'
import { Label } from './ui/label'
import { RadioGroup, RadioGroupItem } from './ui/radio-group'
import { useState } from 'react'

export const LessonSearch = () => {
  const [style, setStyle] = useState('color')
  const data = [
    { label: '图片', value: 'image' },
    { label: '颜色', value: 'color' },
  ]
  return (
    <div className="text-center grid grid-cols-[auto_1fr] gap-2">
      <RadioGroup
        defaultValue={style}
        className="flex"
        onValueChange={(style) => setStyle(style)}>
        {data.map((item, index) => (
          <Label
            key={index}
            className={classnames(
              'flex items-center gap-1 space-x-2 border p-3 rounded-md cursor-pointer',
              {
                'border-primary': style == item.value,
              },
            )}>
            <RadioGroupItem value={item.value} />
            {item.label}
          </Label>
        ))}
      </RadioGroup>

      <div className="flex  items-center space-x-2">
        <Input type="email" placeholder="" />
        <Button type="submit" variant={'outline'}>
          搜索
        </Button>
      </div>
    </div>
  )
}
