import React, { useCallback, useEffect } from "react"
import _ from 'lodash'
interface ParamsType {
	current: number, last_page: number,
	change: (page: number) => void
}
export const useKeyChangePage = (params: ParamsType) => {

	const handle = useCallback((event: KeyboardEvent) => {
		switch (event.code) {
			case 'ArrowLeft':
				if (params.current > 1)
					params.change(params.current - 1)
				break;
			case 'ArrowRight':
				if (params.current < params.last_page)
					params.change(params.current + 1)
				break;
		}
	}, [params])
	const debounceHandle = _.debounce(handle, 300)
	useEffect(() => {
		document.addEventListener('keyup', debounceHandle)
		return () => {
			document.removeEventListener('keyup', debounceHandle)
		}
	}, [handle])
}