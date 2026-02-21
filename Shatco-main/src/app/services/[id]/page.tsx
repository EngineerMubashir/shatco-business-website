import { serviceCategories } from "@/components/sections/ProductsAndServices";
import ServiceDetails from "./ServiceDetails";

export async function generateStaticParams() {
  return serviceCategories.map((service) => ({
    id: service.id.toString(),
  }));
}

export default function ServicePage({ params }: { params: { id: string } }) {
  const service = serviceCategories.find((s) => s.id === params.id);

  if (!service) {
    return <div>Service not found</div>;
  }

  return <ServiceDetails service={service} />;
}
