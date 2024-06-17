import { createLazyFileRoute } from "@tanstack/react-router";

export const Route = createLazyFileRoute("/_front/lesson/video")({
    component: () => <div>视频播放</div>,
});
