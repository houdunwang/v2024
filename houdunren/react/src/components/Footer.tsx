import React from 'react'

export const Footer = () => {
	return (
		<main className=' mt-20 '>
			<section className="border-t border-hd-border mb-10 flex justify-center">

				<div className="bg-[#f39c12] text-white px-2 rounded-md -mt-3 border">后盾人 人人做后盾</div>
			</section>
			<section className="mb-10 flex flex-col justify-center items-center">
				<img src="/images/xj.jpg" className='w-72 rounded-lg' />
				<div className='flex justify-center font-bold mt-5 '>
					本站编码 <div className='text-hd-primary'>向军大叔</div>
				</div>
				<div className=' flex bg-[#16a085] text-gray-50 rounded-md px-2 text-sm py-2'>
					晚上八点直播 来直播间聊聊天吧
				</div>
			</section>
			<section className='bg-hd-background text-center text-sm py-16 '>
				后盾人 人人做后盾 <br />
				Copyright © houdunren All Rights Reserved
			</section>

		</main>
	)
}
