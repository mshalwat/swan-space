import { Globe, Smartphone, Database, LineChart, Settings, Users, Code, Palette, MessageSquare, Shield, Zap, HeadphonesIcon } from 'lucide-react';
import { ServiceCard } from '../ServiceCard';

export function ServicesPage() {
  const mainServices = [
    {
      icon: Globe,
      title: 'Website Development',
      description: 'Modern, responsive websites that showcase your school\'s unique identity and values to the world.'
    },
    {
      icon: Smartphone,
      title: 'Mobile-First Design',
      description: 'Beautiful, user-friendly interfaces optimized for every device, ensuring accessibility for all stakeholders.'
    },
    {
      icon: Database,
      title: 'School Management Systems',
      description: 'Comprehensive digital platforms to streamline administration, communication, and daily operations.'
    },
    {
      icon: LineChart,
      title: 'Digital Transformation',
      description: 'Strategic guidance to modernize your institution\'s digital presence and workflows.'
    },
    {
      icon: Settings,
      title: 'Custom Integrations',
      description: 'Seamless connections between your existing tools and new digital solutions.'
    },
    {
      icon: Users,
      title: 'Training & Support',
      description: 'Comprehensive onboarding and ongoing assistance to ensure your team\'s success.'
    }
  ];

  const additionalServices = [
    {
      icon: Code,
      title: 'Custom Development',
      description: 'Tailored solutions built specifically for your unique requirements.'
    },
    {
      icon: Palette,
      title: 'Brand Identity',
      description: 'Create a cohesive visual identity that reflects your school\'s values.'
    },
    {
      icon: MessageSquare,
      title: 'Communication Platforms',
      description: 'Tools to connect teachers, students, and parents effectively.'
    },
    {
      icon: Shield,
      title: 'Security & Compliance',
      description: 'Ensure your data is protected and meets all regulatory requirements.'
    },
    {
      icon: Zap,
      title: 'Performance Optimization',
      description: 'Fast, efficient systems that scale with your institution.'
    },
    {
      icon: HeadphonesIcon,
      title: 'Dedicated Support',
      description: '24/7 assistance to keep your systems running smoothly.'
    }
  ];

  const benefits = [
    {
      title: 'Education-Focused Expertise',
      description: 'We understand the unique challenges and requirements of educational institutions.'
    },
    {
      title: 'Proven Track Record',
      description: 'Successfully delivered 50+ projects with 98% client satisfaction rate.'
    },
    {
      title: 'End-to-End Solutions',
      description: 'From initial consultation to ongoing support, we handle everything.'
    },
    {
      title: 'Scalable Technology',
      description: 'Solutions that grow with your institution, from small schools to large campuses.'
    }
  ];

  return (
    <section id="services-page" className="py-20 bg-white">
      <div className="container-custom">
        {/* Header */}
        <div className="text-center mb-16">
          <div className="inline-block px-4 py-2 bg-[#F9FAFB] rounded-full border border-[#E2E8F0] mb-6">
            <span className="text-sm text-[#5FA8D3] font-medium">Our Services</span>
          </div>
          <h2 className="mb-6">
            Our Digital Solutions for{' '}
            <span className="bg-gradient-to-r from-[#5FA8D3] to-[#8EC5FC] bg-clip-text text-transparent">
              Schools
            </span>
          </h2>
          <p className="text-xl text-[#475569] max-w-3xl mx-auto">
            Comprehensive digital services designed specifically for educational institutions. 
            From websites to full management systems, we've got you covered.
          </p>
        </div>

        {/* Main Services */}
        <div className="mb-20">
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {mainServices.map((service, index) => (
              <ServiceCard key={index} {...service} />
            ))}
          </div>
        </div>

        {/* Why Choose SwanSpace */}
        <div className="mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Why Choose SwanSpace</h3>
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {benefits.map((benefit, index) => (
              <div key={index} className="bg-[#F9FAFB] rounded-2xl p-6 text-center">
                <div className="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center">
                  <span className="text-2xl">✓</span>
                </div>
                <h5 className="mb-3 text-[#0F172A]">{benefit.title}</h5>
                <p className="text-[#475569] text-sm">{benefit.description}</p>
              </div>
            ))}
          </div>
        </div>

        {/* Additional Services */}
        <div className="mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Additional Services</h3>
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {additionalServices.map((service, index) => (
              <div
                key={index}
                className="bg-white rounded-xl p-6 border border-[#E2E8F0] hover:border-[#5FA8D3] hover:shadow-sm transition-all"
              >
                <service.icon className="w-8 h-8 text-[#5FA8D3] mb-4" />
                <h5 className="mb-2 text-[#0F172A]">{service.title}</h5>
                <p className="text-[#475569] text-sm">{service.description}</p>
              </div>
            ))}
          </div>
        </div>

        {/* Process */}
        <div className="bg-gradient-to-br from-[#F9FAFB] to-white rounded-3xl p-8 lg:p-12 border border-[#E2E8F0] mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Our Process</h3>
          <div className="grid md:grid-cols-4 gap-8">
            {[
              { step: '01', title: 'Discovery', description: 'We learn about your needs and goals' },
              { step: '02', title: 'Strategy', description: 'We create a tailored plan' },
              { step: '03', title: 'Development', description: 'We build your solution' },
              { step: '04', title: 'Support', description: 'We ensure ongoing success' }
            ].map((phase, index) => (
              <div key={index} className="text-center">
                <div className="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center">
                  <span className="text-white text-xl">{phase.step}</span>
                </div>
                <h5 className="mb-2 text-[#0F172A]">{phase.title}</h5>
                <p className="text-[#475569] text-sm">{phase.description}</p>
              </div>
            ))}
          </div>
        </div>

        {/* CTA */}
        <div className="text-center">
          <h3 className="mb-4 text-[#0F172A]">Ready to get started?</h3>
          <p className="text-xl text-[#475569] mb-8 max-w-2xl mx-auto">
            Let's discuss how our services can help transform your school's digital presence.
          </p>
          <a
            href="#contact"
            className="inline-block px-8 py-4 bg-[#5FA8D3] text-white rounded-full hover:bg-[#4A90BB] transition-all shadow-lg"
          >
            Schedule a Consultation
          </a>
        </div>
      </div>
    </section>
  );
}
