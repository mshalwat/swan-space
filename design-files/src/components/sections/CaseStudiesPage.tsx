import { CaseStudyCard } from '../CaseStudyCard';

export function CaseStudiesPage() {
  const caseStudies = [
    {
      title: 'Swan Schule Digital Transformation',
      description: 'A comprehensive platform that revolutionized communication between students, parents, and teachers while streamlining administrative processes.',
      imageUrl: 'https://images.unsplash.com/photo-1603958956194-cf9718dba4b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjBzY2hvb2wlMjBidWlsZGluZ3xlbnwxfHx8fDE3NjI3NDgxNTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
      tags: ['Website', 'Management System', 'Mobile App'],
      stats: [
        { label: 'Engagement', value: '+150%' },
        { label: 'Users', value: '5,000+' },
        { label: 'Satisfaction', value: '4.9/5' }
      ]
    },
    {
      title: 'International School Munich',
      description: 'Modern multilingual website with integrated event management and online admissions system for a diverse international community.',
      imageUrl: 'https://images.unsplash.com/photo-1758270704534-fd9715bffc0e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHRlY2hub2xvZ3klMjBjbGFzc3Jvb218ZW58MXx8fHwxNzYyODYyODA3fDA&ixlib=rb-4.1.0&q=80&w=1080',
      tags: ['Website', 'Admissions', 'Events'],
      stats: [
        { label: 'Applications', value: '+200%' },
        { label: 'Languages', value: '5' },
        { label: 'Events/Year', value: '100+' }
      ]
    },
    {
      title: 'Gymnasium Berlin',
      description: 'Custom learning management system with virtual classrooms, assignment tracking, and parent portal for enhanced educational experience.',
      imageUrl: 'https://images.unsplash.com/photo-1762330910399-95caa55acf04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlZHVjYXRpb24lMjBkaWdpdGFsJTIwbGVhcm5pbmd8ZW58MXx8fHwxNzYyODYyODA4fDA&ixlib=rb-4.1.0&q=80&w=1080',
      tags: ['LMS', 'Virtual Classroom', 'Parent Portal'],
      stats: [
        { label: 'Active Classes', value: '120+' },
        { label: 'Time Saved', value: '60%' },
        { label: 'Digital Rate', value: '95%' }
      ]
    }
  ];

  const upcomingProjects = [
    'European Academy - Brand Identity & Website',
    'TechSchool Hamburg - Student Portal',
    'Montessori Institute - Learning Platform'
  ];

  return (
    <section id="case-studies" className="py-20 bg-white">
      <div className="container-custom">
        {/* Header */}
        <div className="text-center mb-16">
          <div className="inline-block px-4 py-2 bg-[#F9FAFB] rounded-full border border-[#E2E8F0] mb-6">
            <span className="text-sm text-[#5FA8D3] font-medium">Case Studies</span>
          </div>
          <h2 className="mb-6">
            Success{' '}
            <span className="bg-gradient-to-r from-[#5FA8D3] to-[#8EC5FC] bg-clip-text text-transparent">
              Stories
            </span>
          </h2>
          <p className="text-xl text-[#475569] max-w-3xl mx-auto">
            Explore how we've helped schools transform their digital presence 
            and achieve remarkable results.
          </p>
        </div>

        {/* Featured Case Study - Swan Schule */}
        <div className="mb-16">
          <div className="bg-gradient-to-br from-[#F9FAFB] to-white rounded-3xl p-8 lg:p-12 border border-[#E2E8F0]">
            <div className="grid lg:grid-cols-2 gap-12 items-center">
              <div>
                <div className="inline-block px-4 py-2 bg-white rounded-full border border-[#E2E8F0] mb-6">
                  <span className="text-sm text-[#5FA8D3] font-medium">⭐ Featured Project</span>
                </div>
                <h3 className="mb-4 text-[#0F172A]">Swan Schule: A Digital Success Story</h3>
                <p className="text-lg text-[#475569] mb-6">
                  Our flagship project that started it all. We partnered with Swan Schule 
                  to create a comprehensive digital ecosystem that transformed how the school 
                  operates and communicates.
                </p>
                
                <div className="grid grid-cols-2 gap-4 mb-8">
                  <div className="bg-white rounded-xl p-4 border border-[#E2E8F0]">
                    <div className="text-3xl text-[#5FA8D3] mb-1">150%</div>
                    <div className="text-sm text-[#475569]">Increased Engagement</div>
                  </div>
                  <div className="bg-white rounded-xl p-4 border border-[#E2E8F0]">
                    <div className="text-3xl text-[#5FA8D3] mb-1">5,000+</div>
                    <div className="text-sm text-[#475569]">Active Users</div>
                  </div>
                  <div className="bg-white rounded-xl p-4 border border-[#E2E8F0]">
                    <div className="text-3xl text-[#5FA8D3] mb-1">60%</div>
                    <div className="text-sm text-[#475569]">Time Saved</div>
                  </div>
                  <div className="bg-white rounded-xl p-4 border border-[#E2E8F0]">
                    <div className="text-3xl text-[#5FA8D3] mb-1">4.9/5</div>
                    <div className="text-sm text-[#475569]">User Rating</div>
                  </div>
                </div>

                <button className="px-8 py-4 bg-[#5FA8D3] text-white rounded-full hover:bg-[#4A90BB] transition-all">
                  View Full Case Study →
                </button>
              </div>

              <div className="space-y-4">
                <div className="bg-white rounded-2xl p-6 border border-[#E2E8F0]">
                  <h5 className="mb-3 text-[#0F172A]">The Challenge</h5>
                  <p className="text-[#475569]">
                    Swan Schule needed to modernize their communication channels and 
                    streamline administrative processes to better serve their growing community.
                  </p>
                </div>
                <div className="bg-white rounded-2xl p-6 border border-[#E2E8F0]">
                  <h5 className="mb-3 text-[#0F172A]">The Solution</h5>
                  <p className="text-[#475569]">
                    A custom-built platform featuring a modern website, parent portal, 
                    teacher dashboard, and mobile-responsive design.
                  </p>
                </div>
                <div className="bg-white rounded-2xl p-6 border border-[#E2E8F0]">
                  <h5 className="mb-3 text-[#0F172A]">The Impact</h5>
                  <p className="text-[#475569]">
                    Dramatically improved communication efficiency, reduced administrative 
                    workload, and enhanced overall satisfaction among all stakeholders.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Other Case Studies */}
        <div className="mb-16">
          <h3 className="text-center mb-12 text-[#0F172A]">More Success Stories</h3>
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {caseStudies.slice(1).map((study, index) => (
              <CaseStudyCard key={index} {...study} />
            ))}
          </div>
        </div>

        {/* Upcoming Projects */}
        <div className="bg-gradient-to-br from-[#F9FAFB] to-white rounded-3xl p-8 lg:p-12 border border-[#E2E8F0]">
          <div className="text-center mb-8">
            <h3 className="mb-4 text-[#0F172A]">Coming Soon</h3>
            <p className="text-[#475569]">
              We're currently working on exciting new projects with these institutions:
            </p>
          </div>
          <div className="max-w-2xl mx-auto space-y-4">
            {upcomingProjects.map((project, index) => (
              <div
                key={index}
                className="flex items-center gap-4 bg-white rounded-xl p-4 border border-[#E2E8F0]"
              >
                <div className="w-10 h-10 rounded-lg bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center flex-shrink-0">
                  <span className="text-white">🚀</span>
                </div>
                <span className="text-[#475569]">{project}</span>
              </div>
            ))}
          </div>
        </div>

        {/* CTA */}
        <div className="text-center mt-16">
          <h3 className="mb-4 text-[#0F172A]">Ready to write your success story?</h3>
          <p className="text-xl text-[#475569] mb-8 max-w-2xl mx-auto">
            Let's discuss how SwanSpace can help transform your school's digital presence.
          </p>
          <a
            href="#contact"
            className="inline-block px-8 py-4 bg-[#5FA8D3] text-white rounded-full hover:bg-[#4A90BB] transition-all shadow-lg"
          >
            Start Your Project
          </a>
        </div>
      </div>
    </section>
  );
}
