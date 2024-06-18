import { createLazyFileRoute } from "@tanstack/react-router";

export const Route = createLazyFileRoute("/_front/lesson/")({
    component: () => <div>课程列表</div>,
});
