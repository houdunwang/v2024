import { createLazyFileRoute } from "@tanstack/react-router";
export const Route = createLazyFileRoute("/_front/")({
    component: Index,
});

function Index() {
    return <div className="p-2"></div>;
}
