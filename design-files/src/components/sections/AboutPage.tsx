import { Target, Award, Users, Heart, TrendingUp, Shield } from 'lucide-react';
import { ImageWithFallback } from '../figma/ImageWithFallback';

export function AboutPage() {
  const values = [
    {
      icon: Target,
      title: 'Mission-Driven',
      description: 'We exist to make digital transformation accessible to every educational institution.'
    },
    {
      icon: Heart,
      title: 'Student-Centered',
      description: 'Every decision we make prioritizes the learning experience and student success.'
    },
    {
      icon: Shield,
      title: 'Trust & Security',
      description: 'We safeguard your data and maintain the highest standards of privacy and security.'
    },
    {
      icon: TrendingUp,
      title: 'Innovation',
      description: 'We stay ahead of the curve, bringing cutting-edge solutions to education.'
    }
  ];

  const timeline = [
    {
      year: '2019',
      title: 'The Beginning',
      description: 'Founded to transform Swan Schule\'s digital presence.'
    },
    {
      year: '2020',
      title: 'First Success',
      description: 'Launched the award-winning Swan Schule platform.'
    },
    {
      year: '2021',
      title: 'Expansion',
      description: 'Partnered with 10+ schools across Germany.'
    },
    {
      year: '2022',
      title: 'Recognition',
      description: 'Named Best EdTech Solution Provider.'
    },
    {
      year: '2023-2025',
      title: 'Growth',
      description: 'Serving 50+ institutions with innovative solutions.'
    }
  ];

  const team = [
    { name: 'Dr. Sarah Chen', role: 'Founder & CEO', initial: 'S' },
    { name: 'Michael Weber', role: 'CTO', initial: 'M' },
    { name: 'Anna Schmidt', role: 'Head of Design', initial: 'A' },
    { name: 'David Johnson', role: 'Lead Developer', initial: 'D' }
  ];

  return (
    <section id="about" className="py-20 bg-[#F9FAFB]">
      <div className="container-custom">
        {/* Header */}
        <div className="text-center mb-16">
          <div className="inline-block px-4 py-2 bg-white rounded-full border border-[#E2E8F0] mb-6">
            <span className="text-sm text-[#5FA8D3] font-medium">About Us</span>
          </div>
          <h2 className="mb-6">
            Our{' '}
            <span className="bg-gradient-to-r from-[#5FA8D3] to-[#8EC5FC] bg-clip-text text-transparent">
              Story
            </span>
          </h2>
          <p className="text-xl text-[#475569] max-w-3xl mx-auto">
            From a single school project to a leading EdTech solutions provider, 
            SwanSpace has been on a mission to transform education through technology.
          </p>
        </div>

        {/* Timeline */}
        <div className="mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Our Journey</h3>
          <div className="max-w-4xl mx-auto">
            <div className="space-y-8">
              {timeline.map((item, index) => (
                <div key={index} className="flex gap-6 items-start">
                  <div className="flex-shrink-0 w-24 text-right">
                    <span className="text-2xl text-[#5FA8D3]">{item.year}</span>
                  </div>
                  <div className="relative flex-shrink-0 w-4 h-4 mt-2">
                    <div className="absolute top-0 left-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-[#5FA8D3] ring-4 ring-white"></div>
                    {index < timeline.length - 1 && (
                      <div className="absolute top-4 left-1/2 -translate-x-1/2 w-0.5 h-16 bg-[#E2E8F0]"></div>
                    )}
                  </div>
                  <div className="flex-1 bg-white rounded-2xl p-6 shadow-sm">
                    <h4 className="mb-2 text-[#0F172A]">{item.title}</h4>
                    <p className="text-[#475569]">{item.description}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        {/* Values */}
        <div className="mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Our Values</h3>
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {values.map((value, index) => (
              <div key={index} className="bg-white rounded-2xl p-8 text-center shadow-sm">
                <div className="w-14 h-14 mx-auto rounded-xl bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center mb-6">
                  <value.icon className="w-7 h-7 text-white" />
                </div>
                <h5 className="mb-3 text-[#0F172A]">{value.title}</h5>
                <p className="text-[#475569] text-sm">{value.description}</p>
              </div>
            ))}
          </div>
        </div>

        {/* Team */}
        <div className="mb-20">
          <h3 className="text-center mb-12 text-[#0F172A]">Meet Our Team</h3>
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-4xl mx-auto">
            {team.map((member, index) => (
              <div key={index} className="bg-white rounded-2xl p-6 text-center shadow-sm">
                <div className="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center mb-4">
                  <span className="text-white text-2xl">{member.initial}</span>
                </div>
                <h5 className="mb-1 text-[#0F172A]">{member.name}</h5>
                <p className="text-[#475569] text-sm">{member.role}</p>
              </div>
            ))}
          </div>
        </div>

        {/* CTA */}
        <div className="bg-gradient-to-br from-[#5FA8D3] to-[#8EC5FC] rounded-3xl p-12 text-center text-white">
          <h3 className="mb-4 text-white">Join Our Mission</h3>
          <p className="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
            Partner with us to bring world-class digital solutions to your educational institution.
          </p>
          <a
            href="#contact"
            className="inline-block px-8 py-4 bg-white text-[#5FA8D3] rounded-full hover:bg-[#F9FAFB] transition-all shadow-lg"
          >
            Get Started Today
          </a>
        </div>
      </div>
    </section>
  );
}
