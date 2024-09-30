export const Footer = () => {
  return (
    <div className='mt-72'>
      <section className='flex flex-col items-center justify-center border-t '>
        <div className='bg-gradient-to-l from-blue-500  to-purple-600 text-white font-light px-3 py-1 rounded-lg -mt-4 text-sm'>
          后盾人 人人做后盾
        </div>
        <div className='w-64 rounded-lg overflow-hidden mt-6'>
          <img src='/images/xj.jpeg' alt='' />
        </div>
        <div className='flex justify-center gap-2 font-bold mt-3'>
          <span className=''>本站编码</span>
          <span className='text-amber-500'>向军大叔</span>
        </div>
        <div className='bg-gray-500 px-3 py-2  rounded-lg text-white text-sm mt-6'>
          晚八点来直播,来间聊聊天吧
        </div>
      </section>
      <div className='bg-gray-900 mt-16 text-center text-white py-16  text-slate-200/80 leading-7 text-sm'>
        后盾人 人人做后盾 <br />
        信:232323232 箱：223344334 <br />
        Copyright © houdunren All Rights Reserved <br />
        ICP证: 京sdfsdfsdfsdf <br />
      </div>
    </div>
  )
}
